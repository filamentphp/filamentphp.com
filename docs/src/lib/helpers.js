export function collectHeadings(headings = []) {
    let sections = []

    for (let heading of headings) {
        if (heading.depth === 2 || heading.depth === 3) {
            let title = heading.text.replace(/^#/, '')
            if (title) {
                if (heading.depth === 3) {
                    if (!sections[sections.length - 1]) {
                        throw new Error(
                            'Cannot add `h3` to table of contents without a preceding `h2`',
                        )
                    }
                    sections[sections.length - 1].children.push({
                        ...heading,
                        title,
                    })
                } else {
                    sections.push({ ...heading, title, children: [] })
                }
            }
        }

        sections.push(...collectHeadings(heading.children ?? []))
    }

    return sections
}

export function getAllLinks(links) {
    let children = []

    links.map((link) => {
        if (link.links && link.links.length) {
            children.push(link.links.flat())
        } else {
            children.push(link)
        }
    })

    return children.flat()
}
