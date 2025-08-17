import ClipboardJS from 'clipboard/dist/clipboard'

export default (Alpine) => {
    Alpine.data('codeBlockClipboard', () => ({
        codeBlocks: document.querySelectorAll('pre') || [],
        clipboardIcon: `<svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path><path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"></path></svg>`,
        clipboardCopiedIcon: `<svg fill="currentColor" class="fill-current text-burnt-butter dark:text-white h-5 w-5" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>`,
        init() {
            this.codeBlocks.forEach((element, key) => {
                const wrapper = document.createElement('div')

                ;['relative', 'code-block-wrapper'].forEach((value) =>
                    wrapper.classList.add(value),
                )

                element.parentNode.insertBefore(wrapper, element)

                wrapper.appendChild(element)

                let copyToClipboardButton = document.createElement('button')
                copyToClipboardButton.innerHTML = this.clipboardIcon
                copyToClipboardButton.id = `code-block-copy-button-${key}`
                ;[
                    'md:block',
                    'hidden',
                    'absolute',
                    'rounded-xl',
                    'top-0',
                    'end-0',
                    'p-3',
                    'bg-white/50',
                    'dark:bg-black/50',
                    'text-butter/70',
                    'dark:text-white/50',
                ].forEach((value) => copyToClipboardButton.classList.add(value))

                copyToClipboardButton.setAttribute(
                    'aria-label',
                    'Copy to Clipboard',
                )
                copyToClipboardButton.setAttribute('title', 'Copy to Clipboard')
                copyToClipboardButton.classList.add('code-block-copy-button')

                wrapper.appendChild(copyToClipboardButton)

                let copyToClipboard = new ClipboardJS(
                    `#${copyToClipboardButton.id}`,
                )
                copyToClipboard.on('success', (element) => {
                    copyToClipboardButton.innerHTML = this.clipboardCopiedIcon
                    element.clearSelection()
                    setTimeout(
                        () =>
                            (copyToClipboardButton.innerHTML =
                                this.clipboardIcon),
                        1500,
                    )
                })

                let codeElement = element.querySelector('code')
                codeElement.id = `code-block-text-${key}`
                copyToClipboardButton.dataset.clipboardTarget = `#${codeElement.id}`
            })
        },
    }))
}
