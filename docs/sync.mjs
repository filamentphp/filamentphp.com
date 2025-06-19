import fs from 'node:fs'
import path from 'node:path'
import GrafiteHelper from '@grafite/helpers'
import { copy } from 'fs-extra'
import matter from 'gray-matter'

const getDirContents = (dir, filelist = []) => {
    fs.readdirSync(dir)
        .filter((name) => name !== '.DS_Store')
        .forEach((file) => {
            filelist = fs.statSync(path.join(dir, file)).isDirectory()
                ? getDirContents(path.join(dir, file), filelist)
                : filelist.concat(path.join(dir, file))
        })
    return filelist
}

const packageSlugToTitle = (slug) => {
    switch (slug) {
        case 'admin':
            return 'Admin Panel'
        case 'support':
            return 'Core Concepts'
        default:
            return GrafiteHelper(slug.replace('-', ' ')).title()
    }
}

const filenameToSlug = (filename) => {
    return filename
        .replace('.md', '')
        .replace('.mdx', '')
        .replace(/^[0-9]*-/, '')
}

const docSlugToTitle = (slug) => {
    return GrafiteHelper(filenameToSlug(slug).replaceAll('-', ' ')).title()
}

const getTitleFromMarkdown = (file) => {
    const fileData = fs.readFileSync(file, 'utf8', (err, data) => {
        if (err) {
            return console.log(err)
        }
    })
    const { data: frontmatter } = matter(fileData)
    return frontmatter.title
}

console.log('Processing docs...')

let structure = []
let versions = fs
    .readdirSync('./filament')
    .filter((name) => name !== '.DS_Store')

versions.forEach((version) => {
    if (fs.existsSync(`./src/pages/${version}`)) {
        fs.rmSync(`./src/pages/${version}`, { recursive: true })
    }

    structure.push({ version: version, href: null, links: [] })

    if (version === '1.x') {
        const versionEntry = structure.find((item) => item.version === version)
        const files = fs
            .readdirSync(`./filament/${version}/docs`)
            .filter((name) => name !== '.DS_Store')

        versionEntry.links = files.map((file) => {
            return {
                title: docSlugToTitle(file),
                slug: filenameToSlug(file),
                href: `/docs/1.x/admin/${filenameToSlug(file)}`,
                links: [],
            }
        })

        fs.mkdir(`src/pages/1.x/admin`, { recursive: true }, () => {
            const sourceFiles = getDirContents(`./filament/1.x/docs`)

            sourceFiles.forEach((file) => {
                const destination = file
                    .split('docs/')
                    .pop()
                    .replaceAll(/(\d+\-)/g, '')
                    .replace('.md', '.mdx')

                copy(file, `src/pages/${version}/admin/${destination}`).then(
                    (res) => {
                        fs.readFile(
                            `src/pages/${version}/admin/${destination}`,
                            'utf8',
                            (err, data) => {
                                if (err) {
                                    return console.log(err)
                                }

                                let result = data.replace(
                                    '---',
                                    `---\nlayout: "@layouts/BaseLayout.astro"\ngithubUrl: https://github.com/filamentphp/filament/edit/${file.replace(
                                        'filament/',
                                        '',
                                    )}"`,
                                )

                                fs.writeFile(
                                    `src/pages/${version}/admin/${destination}`,
                                    result,
                                    'utf8',
                                    (err) => {
                                        if (err) return console.log(err)
                                    },
                                )
                            },
                        )
                    },
                )
            })
        })
    } else {
        const packagesOrder = [
            'panels',
            'admin',
            'tables',
            'schemas',
            'forms',
            'infolists',
            'actions',
            'notifications',
            'widgets',
            'support',
        ]

        const packages = fs
            .readdirSync(`./filament/${version}/packages`)
            .sort(function (a, b) {
                return packagesOrder.indexOf(a) - packagesOrder.indexOf(b)
            })
            .filter((name) => name !== '.DS_Store')

        packages.forEach((packageName) => {
            if (
                !packageName.includes('-plugin') &&
                fs.existsSync(
                    `./filament/${version}/packages/${packageName}/docs`,
                )
            ) {
                const docStructure = []
                const versionEntry = structure.find(
                    (item) => item.version === version,
                )
                const sourceFiles = getDirContents(
                    `./filament/${version}/packages/${packageName}/docs`,
                )

                const dirStructure = sourceFiles.map((file) => {
                    return {
                        file: file
                            .split('docs/')
                            .pop()
                            .replaceAll(/(\d+\-)/g, ''),
                        title: getTitleFromMarkdown(file),
                    }
                })

                dirStructure.map(({ file, title }) => {
                    const split = file.split('/')

                    if (split.length === 1) {
                        docStructure.push({
                            title: title || docSlugToTitle(file),
                            slug: filenameToSlug(file),
                            href: `/docs/${version}/${packageName}/${filenameToSlug(
                                file,
                            )}`,
                            links: [],
                        })
                    } else {
                        let parent = docStructure.find(
                            (item) => item.slug === split[0],
                        )

                        if (!parent) {
                            docStructure.push({
                                title: docSlugToTitle(split[0]),
                                slug: filenameToSlug(split[0]),
                                href: `/docs/${version}/${packageName}/${filenameToSlug(
                                    file,
                                )}`,
                                links: [],
                            })
                        }

                        parent = docStructure.find(
                            (item) => item.slug === split[0],
                        )
                        parent.links.push({
                            title: title || docSlugToTitle(split[1]),
                            slug: filenameToSlug(split[1]),
                            href: `/docs/${version}/${packageName}/${filenameToSlug(
                                file,
                            )}`,
                            links: [],
                        })
                    }
                })

                versionEntry.links.push({
                    title: packageSlugToTitle(packageName),
                    slug: packageName,
                    href: docStructure[0].href,
                    links: docStructure,
                })

                fs.mkdir(
                    `src/pages/${version}/${packageName}`,
                    { recursive: true },
                    () => {
                        sourceFiles.forEach((file, index) => {
                            const destination = file
                                .split('docs/')
                                .pop()
                                .replaceAll(/(\d+\-)/g, '')
                                .replace('.md', '.mdx')

                            copy(
                                file,
                                `src/pages/${version}/${packageName}/${destination}`,
                            ).then((res) => {
                                fs.readFile(
                                    `src/pages/${version}/${packageName}/${destination}`,
                                    'utf8',
                                    (err, data) => {
                                        if (err) {
                                            return console.log(err)
                                        }

                                        let result = data.replace(
                                            '---',
                                            `---\nlayout: "@layouts/BaseLayout.astro"\ngithubUrl: "https://github.com/filamentphp/filament/edit/${file.replace(
                                                'filament/',
                                                '',
                                            )}"`,
                                        )

                                        fs.writeFile(
                                            `src/pages/${version}/${packageName}/${destination}`,
                                            result,
                                            'utf8',
                                            (err) => {
                                                if (err) return console.log(err)
                                            },
                                        )
                                    },
                                )
                            })
                        })
                    },
                )
            }
        })

        if (!fs.existsSync(`./filament/${version}/docs`)) {
            structure.find((item) => item.version === version).href =
                structure.find((item) => item.version === version).links[0].href

            return
        }

        const sourceFiles = getDirContents(`./filament/${version}/docs`)

        const dirStructure = sourceFiles.map((file) => {
            return {
                file: file
                    .split('docs/')
                    .pop()
                    .replaceAll(/(\d+\-)/g, ''),
                title: getTitleFromMarkdown(file),
            }
        })

        let insertLinksBeforePackages = true
        const linksToInsertBeforePackages = []

        dirStructure.map(({ file, title }) => {
            if (file === '_PACKAGES') {
                insertLinksBeforePackages = false
                structure.find((item) => item.version === version).links = [
                    ...linksToInsertBeforePackages,
                    ...structure.find((item) => item.version === version).links,
                ]

                return
            }

            const split = file.split('/')

            if (split.length === 1) {
                ;(insertLinksBeforePackages
                    ? linksToInsertBeforePackages
                    : structure.find((item) => item.version === version).links
                ).push({
                    title: title || docSlugToTitle(file),
                    slug: filenameToSlug(file),
                    href: `/docs/${version}/${filenameToSlug(file)}`,
                    links: [],
                })
            } else {
                let parent = (
                    insertLinksBeforePackages
                        ? linksToInsertBeforePackages
                        : structure.find((item) => item.version === version)
                              .links
                ).find((item) => item.slug === split[0])

                if (!parent) {
                    ;(insertLinksBeforePackages
                        ? linksToInsertBeforePackages
                        : structure.find((item) => item.version === version)
                              .links
                    ).push({
                        title: ((slug) => {
                            switch (slug) {
                                case 'about':
                                    return 'About Filament'
                                case 'styling':
                                    return 'Customizing styling'
                                case 'tenancy':
                                    return 'Multi-tenancy'
                                case 'ui':
                                    return 'Blade UI components'
                                default:
                                    return GrafiteHelper(
                                        slug.replace('-', ' '),
                                    ).title()
                            }
                        })(filenameToSlug(split[0])),
                        slug: filenameToSlug(split[0]),
                        href: `/docs/${version}/${filenameToSlug(file)}`,
                        links: [],
                    })
                }

                parent = (
                    insertLinksBeforePackages
                        ? linksToInsertBeforePackages
                        : structure.find((item) => item.version === version)
                              .links
                ).find((item) => item.slug === split[0])
                parent.links.push({
                    title: title || docSlugToTitle(split[1]),
                    slug: filenameToSlug(split[1]),
                    href: `/docs/${version}/${filenameToSlug(file)}`,
                    links: [],
                })
            }
        })

        sourceFiles.forEach((file, index) => {
            const destination = file
                .split('docs/')
                .pop()
                .replaceAll(/(\d+\-)/g, '')
                .replace('.md', '.mdx')

            copy(file, `src/pages/${version}/${destination}`).then((res) => {
                if (destination === '_PACKAGES') {
                    return
                }

                fs.readFile(
                    `src/pages/${version}/${destination}`,
                    'utf8',
                    (err, data) => {
                        if (err) {
                            return console.log(err)
                        }

                        let result = data.replace(
                            '---',
                            `---\nlayout: "@layouts/BaseLayout.astro"\ngithubUrl: "https://github.com/filamentphp/filament/edit/${file.replace(
                                'filament/',
                                '',
                            )}"`,
                        )

                        fs.writeFile(
                            `src/pages/${version}/${destination}`,
                            result,
                            'utf8',
                            (err) => {
                                if (err) return console.log(err)
                            },
                        )
                    },
                )
            })
        })
    }

    structure.find((item) => item.version === version).href = structure.find(
        (item) => item.version === version,
    ).links[0].href
})

// write the navigation structure to a file
fs.writeFileSync('./src/navigation.json', JSON.stringify(structure))

console.log('Syncing complete.')
