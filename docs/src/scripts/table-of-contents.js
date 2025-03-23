export default (Alpine) => {
    Alpine.data('tableOfContents', (contents) => ({
        current: null,
        headings: [],
        init() {
            this.getHeadings()
            this.updateCurrentSection()
        },
        getHeadings() {
            this.headings = contents
                .flatMap((node) => [
                    node.slug,
                    ...node.children.map((child) => child.slug),
                ])
                .map((id) => {
                    let el = document.getElementById(id)
                    if (!el) return

                    let style = window.getComputedStyle(el)
                    let scrollMt = parseFloat(style.scrollMarginTop)

                    let top =
                        window.scrollY +
                        el.getBoundingClientRect().top -
                        scrollMt
                    return { id, top }
                })
        },
        updateCurrentSection() {
            let top = window.scrollY + 15
            let current = this.headings[0].id
            for (let heading of this.headings) {
                if (top >= heading.top) {
                    current = heading.id
                } else {
                    break
                }
            }
            this.current = current ?? null
        },
    }))
}
