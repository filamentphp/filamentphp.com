<div
    x-data="{
        whiteBackground: false,
        moveAnimation: false,

        get showMiddlePages() {
            return this.currentPage > 3 && this.currentPage < this.totalPages - 2
        },

        getPage(n) {
            return {
                number: n,
                isCurrent: this.currentPage === n,
            }
        },

        get pagesInRange() {
            if (! this.showMiddlePages) return
            if (this.totalPages > 4 && this.currentPage < 4) return
            if (this.totalPages > 4 && this.currentPage > this.totalPages - 3)
                return

            const beforeCurrent = 2
            const afterCurrent = 2

            const left = Math.max(1, this.currentPage - beforeCurrent)

            const right = Math.min(this.currentPage + afterCurrent, this.totalPages)

            const pages = []

            for (let i = left; i <= right; i++) pages.push(this.getPage(i))

            return pages
        },

        get pagesInRangeForSmallScreen() {
            let beforeCurrent = 1
            let afterCurrent = 1

            if (this.currentPage === this.totalPages) {
                beforeCurrent = 2
            }
            if (this.currentPage === 1) afterCurrent = 2

            const left = Math.max(1, this.currentPage - beforeCurrent)

            const right = Math.min(this.currentPage + afterCurrent, this.totalPages)

            const pages = []

            for (let i = left; i <= right; i++) pages.push(this.getPage(i))

            return pages
        },

        middleArrowMethod() {
            if (this.currentPage < 4) this.currentPage = this.currentPage + 3
            else this.currentPage = this.currentPage - 3
        },

        rightArrowMethod() {
            if (this.currentPage + 3 > this.totalPages)
                this.currentPage = this.currentPage + 1
            else this.currentPage = this.currentPage + 3
        },

        leftArrowMethod() {
            if (this.currentPage - 3 < 1) this.currentPage = this.currentPage - 1
            else this.currentPage = this.currentPage - 3
        },
    }"
    x-init="
        () => {
            $watch('currentPage', () => {
                moveAnimation = true
                setTimeout(() => {
                    moveAnimation = false
                }, 300)
            })
        }
    "
    class="relative flex"
>
    {{-- Previous Button --}}
    <div
        class="mx-0.5 flex h-[36px] min-w-[36px] select-none items-center justify-center rounded-xl text-xs text-neutral-700 transition duration-300"
        :class="{
            'bg-neutral-200/60' : ! whiteBackground,
            'bg-white shadow-lg shadow-black/5' : whiteBackground,
            'cursor-pointer hover:bg-neutral-200' : currentPage !== 1,
            'cursor-not-allowed' : currentPage === 1,
        }"
        x-on:click="currentPage = currentPage > 1 ? currentPage - 1 : currentPage"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="22"
            height="22"
            viewBox="0 0 24 24"
            :class="{
                'opacity-30' : currentPage === 1,
            }"
        >
            <path
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="m15 5l-6 7l6 7"
            />
        </svg>
    </div>

    {{-- Current Page Button --}}
    <div
        class="absolute left-1/2 top-0 z-10 mx-0.5 flex h-[36px] min-w-[36px] select-none items-center justify-center rounded-xl bg-salmon text-sm text-white shadow-lg shadow-salmon/50 transition-all duration-300 md:hidden"
        :class="{
            'scale-110' : moveAnimation,

            '!left-[40px]' : currentPage === 1,
            '!left-[80px]' : (currentPage > 1 && currentPage < totalPages),
            '!left-[120px]' : currentPage === totalPages && totalPages > 2,
        }"
        x-text="currentPage"
    ></div>

    <template x-if="totalPages <= 8">
        <div
            class="absolute left-1/2 top-0 z-10 mx-0.5 hidden h-[36px] min-w-[36px] select-none items-center justify-center rounded-xl bg-salmon text-sm text-white shadow-lg shadow-salmon/50 transition-all duration-300 md:flex"
            :class="{
                'scale-110' : moveAnimation,
                '!left-[40px]' : currentPage === 1,
                '!left-[80px]' : currentPage === 2,
                '!left-[120px]' : currentPage === 3,
                '!left-[160px]' : currentPage === 4,
                '!left-[200px]' : currentPage === 5,
                '!left-[240px]' : currentPage === 6,
                '!left-[280px]' : currentPage === 7,
                '!left-[320px]' : currentPage === 8,
            }"
            x-text="currentPage"
        ></div>
    </template>

    <template x-if="totalPages > 8">
        <div
            class="absolute left-1/2 top-0 z-10 mx-0.5 hidden h-[36px] min-w-[36px] select-none items-center justify-center rounded-xl bg-salmon text-sm text-white shadow-lg shadow-salmon/50 transition-all duration-300 md:flex"
            :class="{
                'scale-110' : moveAnimation,
                '!left-[40px]' : currentPage === 1,
                '!left-[80px]' : currentPage === 2,
                '!left-[120px]' : currentPage === 3,
                '!left-[200px]' : currentPage > 3 && currentPage < (totalPages - 2),
                '!left-[280px]' : currentPage === (totalPages - 2),
                '!left-[320px]' : currentPage === (totalPages - 1),
                '!left-[360px]' : currentPage === totalPages,
            }"
            x-text="currentPage"
        ></div>
    </template>

    <div class="flex items-center justify-center md:hidden">
        <template
            x-for="page in pagesInRangeForSmallScreen"
            :key="page.number"
        >
            <x-ui.pagination-button />
        </template>
    </div>

    <div class="hidden items-center justify-center md:flex">
        <template x-if="totalPages <= 8">
            <template
                x-for="page in totalPages"
                :key="page"
            >
                <x-ui.pagination-button />
            </template>
        </template>
    </div>

    <template x-if="totalPages > 8">
        <div class="hidden w-[360px] items-center justify-center md:flex">
            <div x-data="{
                page: 1,
            }">
                <x-ui.pagination-button />
            </div>
            <template
                x-if="!showMiddlePages"
                x-data="{
                    page: 2,
                }"
            >
                <x-ui.pagination-button />
            </template>
            <template
                x-if="!showMiddlePages"
                x-data="{
                    page: 3,
                }"
            >
                <x-ui.pagination-button />
            </template>
            <template
                x-if="!showMiddlePages"
                x-data="{
                    page: 4,
                }"
            >
                <x-ui.pagination-button />
            </template>

            <template x-if="showMiddlePages">
                <div
                    class="group relative mx-0.5 flex h-[36px] w-[36px] cursor-pointer select-none items-center justify-center"
                    x-on:click="leftArrowMethod"
                >
                    <div
                        class="text-lg tracking-wide transition duration-300 group-hover:opacity-0"
                    >
                        ...
                    </div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        class="absolute right-0 top-2 opacity-0 transition-all duration-200 group-hover:!right-2 group-hover:opacity-100"
                    >
                        <g
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                        >
                            <path d="m13 19l-6-7l6-7" />
                            <path d="m17 19l-6-7l6-7" />
                        </g>
                    </svg>
                </div>
            </template>

            <template x-if="!showMiddlePages">
                <div
                    class="group relative mx-0.5 flex h-[36px] w-[36px] cursor-pointer select-none items-center justify-center"
                    x-on:click="middleArrowMethod"
                >
                    <div
                        class="text-lg tracking-wide transition duration-300 group-hover:opacity-0"
                    >
                        ...
                    </div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        class="absolute top-2 opacity-0 transition-all duration-200 group-hover:opacity-100"
                        :class="{
                            'right-0 group-hover:!right-2' : currentPage > 4,
                            'left-0 group-hover:!left-2 rotate-180' : currentPage < 4,
                        }"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="m15 5l-6 7l6 7"
                        />
                    </svg>
                </div>
            </template>

            <template
                x-for="page in pagesInRange"
                :key="page.number"
            >
                <x-ui.pagination-button />
            </template>

            <template x-if="showMiddlePages">
                <div
                    class="group relative mx-0.5 flex h-[36px] w-[36px] cursor-pointer select-none items-center justify-center"
                    x-on:click="rightArrowMethod"
                >
                    <div
                        class="text-lg tracking-wide transition duration-300 group-hover:opacity-0"
                    >
                        ...
                    </div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        class="absolute left-0 top-2 opacity-0 transition-all duration-200 group-hover:!left-2 group-hover:opacity-100"
                    >
                        <g
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                        >
                            <path d="m11 19l6-7l-6-7" />
                            <path d="m7 19l6-7l-6-7" />
                        </g>
                    </svg>
                </div>
            </template>

            <template
                x-if="!showMiddlePages"
                x-data="{
                    page: totalPages - 3,
                }"
            >
                <x-ui.pagination-button />
            </template>
            <template
                x-if="!showMiddlePages"
                x-data="{
                    page: totalPages - 2,
                }"
            >
                <x-ui.pagination-button />
            </template>
            <template
                x-if="!showMiddlePages"
                x-data="{
                    page: totalPages - 1,
                }"
            >
                <x-ui.pagination-button />
            </template>
            <div
                x-data="{
                    page: totalPages,
                }"
            >
                <x-ui.pagination-button />
            </div>
        </div>
    </template>

    {{-- Next Arrow --}}
    <div
        class="mx-0.5 flex h-[36px] min-w-[36px] select-none items-center justify-center rounded-xl text-xs text-neutral-700 transition duration-300"
        :class="{
            'bg-neutral-200/60' : ! whiteBackground,
            'bg-white shadow-lg shadow-black/5' : whiteBackground,
            'cursor-pointer hover:bg-neutral-200' : currentPage !== totalPages,
            'cursor-not-allowed' : currentPage === totalPages,
        }"
        x-on:click="currentPage = currentPage < totalPages ? currentPage + 1 : currentPage"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="22"
            height="22"
            viewBox="0 0 24 24"
            :class="{
                'opacity-30' : currentPage === totalPages,
            }"
        >
            <path
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="m9 5l6 7l-6 7"
            />
        </svg>
    </div>
</div>
