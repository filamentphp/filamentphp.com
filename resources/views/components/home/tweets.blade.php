<div
    x-data="{
        show_more: false,
    }"
    class="relative mx-auto w-full max-w-(--breakpoint-lg) px-5"
>
    {{-- Tweets Section --}}
    <div
        x-data
        x-ref="tweets_section"
        x-init="
            () => {
                if (reducedMotion) return
                gsap.timeline({
                    scrollTrigger: {
                        trigger: $refs.tweets_section,
                        start: 'top bottom-=200px',
                    },
                })
                    .fromTo(
                        $refs.tweets_section,
                        {
                            autoAlpha: 0,
                        },
                        {
                            autoAlpha: 1,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                    )
                    .fromTo(
                        $refs.twitter_icon,
                        {
                            autoAlpha: 0,
                            x: -30,
                            y: -30,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            y: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.5',
                    )
                    .fromTo(
                        $refs.community,
                        {
                            autoAlpha: 0,
                            x: 50,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '>-0.5',
                    )
                    .fromTo(
                        $refs.community_quote,
                        {
                            autoAlpha: 0,
                            scale: 0,
                        },
                        {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.7,
                            ease: 'back.out',
                        },
                        '>-0.6',
                    )
                    .fromTo(
                        $refs.feedback_header,
                        {
                            autoAlpha: 0,
                            x: -50,
                        },
                        {
                            autoAlpha: 1,
                            x: 0,
                            duration: 0.7,
                            ease: 'circ.out',
                        },
                        '<',
                    )
                    .fromTo(
                        $refs.feedback_header_underline,
                        {
                            autoAlpha: 0,
                            scaleX: 0,
                            transformOrigin: 'left',
                        },
                        {
                            autoAlpha: 1,
                            scaleX: 1,
                            duration: 0.5,
                            ease: 'circ.out',
                        },
                        '>-0.5',
                    )
            }
        "
        class="relative z-1 overflow-hidden rounded-3xl bg-linear-to-t from-transparent via-[#F1F3FF] to-[#E6EAFF] px-5 pb-5"
    >
        {{-- Right side decoration --}}
        <div class="absolute top-14 right-24 hidden md:block lg:right-40">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-28 lg:w-32"
                viewBox="0 0 139 93"
                fill="none"
            >
                <path
                    d="M121.58 27.4799C121.58 27.4799 121.55 18.5999 125.21 14.7399C128.87 10.8799 133.59 0.149902 133.59 0.149902C133.59 0.149902 137.31 5.2099 135.86 9.7799C134.41 14.3499 128.25 19.3899 129.75 24.2599L121.59 27.4699L121.58 27.4799Z"
                    fill="#407BFF"
                />
                <path
                    opacity="0.6"
                    d="M121.58 27.4799C121.58 27.4799 121.55 18.5999 125.21 14.7399C128.87 10.8799 133.59 0.149902 133.59 0.149902C133.59 0.149902 137.31 5.2099 135.86 9.7799C134.41 14.3499 128.25 19.3899 129.75 24.2599L121.59 27.4699L121.58 27.4799Z"
                    fill="white"
                />
                <path
                    d="M134.26 24.8897C134.26 24.8897 132.79 21.8597 129.13 23.3197C125.47 24.7897 122.85 23.9097 122.85 23.9097C122.85 23.9097 117.62 16.7297 112.38 15.7897C107.15 14.8497 97 8.98975 97 8.98975C97 8.98975 97 15.2697 100.87 18.0897C104.74 20.9097 112.7 21.3297 114.37 26.1497L100.77 32.4297C100.77 32.4297 106.63 32.6397 107.15 33.9997C107.67 35.3597 113.12 33.9997 113.12 33.9997L117.41 32.0097C117.41 32.0097 120.24 34.8397 129.13 28.5597C129.13 28.5597 136.14 28.3497 134.26 24.8997V24.8897Z"
                    fill="#407BFF"
                />
                <path
                    opacity="0.8"
                    d="M134.26 24.8897C134.26 24.8897 132.79 21.8597 129.13 23.3197C125.47 24.7897 122.85 23.9097 122.85 23.9097C122.85 23.9097 117.62 16.7297 112.38 15.7897C107.15 14.8497 97 8.98975 97 8.98975C97 8.98975 97 15.2697 100.87 18.0897C104.74 20.9097 112.7 21.3297 114.37 26.1497L100.77 32.4297C100.77 32.4297 106.63 32.6397 107.15 33.9997C107.67 35.3597 113.12 33.9997 113.12 33.9997L117.41 32.0097C117.41 32.0097 120.24 34.8397 129.13 28.5597C129.13 28.5597 136.14 28.3497 134.26 24.8997V24.8897Z"
                    fill="white"
                />
                <path
                    d="M134.26 24.8899C134.26 24.8899 138.37 25.8799 138.37 26.4299C138.37 26.9799 134.01 27.1699 134.01 27.1699C134.01 27.1699 132.43 26.0099 134.26 24.8799V24.8899Z"
                    fill="#407BFF"
                />
                <path
                    d="M100.88 18.08C97.0101 15.25 97.0101 8.97998 97.0101 8.97998C97.0101 8.97998 98.7401 9.97998 101.13 11.21C101.29 13.02 102.02 16.63 105.11 20.13C103.52 19.54 102.02 18.92 100.88 18.08Z"
                    fill="#263238"
                />
                <path
                    d="M133.38 5.15967C133.17 4.24967 132.12 4.74967 130.96 5.64967C132.5 2.64967 133.59 0.159668 133.59 0.159668C133.59 0.159668 137.31 5.21967 135.86 9.78967C135.23 11.7697 133.72 13.8397 132.33 15.9397C134.91 7.60967 133.9 7.35967 133.38 5.15967Z"
                    fill="#263238"
                />
                <path
                    d="M109.25 32.6299C109.43 33.2699 111.64 33.6399 113.44 33.8499L113.13 33.9999C113.13 33.9999 107.69 35.3599 107.16 33.9999C106.64 32.6399 100.78 32.4299 100.78 32.4299L105.69 30.1699C107.57 30.8799 109.09 32.0299 109.26 32.6399L109.25 32.6299Z"
                    fill="#263238"
                />
                <path
                    d="M131.68 24.8397C131.74 25.2597 131.57 25.6297 131.29 25.6697C131.01 25.7097 130.74 25.3997 130.68 24.9897C130.62 24.5697 130.78 24.1997 131.06 24.1597C131.34 24.1197 131.61 24.4297 131.67 24.8497L131.68 24.8397Z"
                    fill="#263238"
                />
                <path
                    d="M132.14 23.62C132.08 23.69 131.99 23.71 131.91 23.67C131.05 23.33 130.04 23.97 130.03 23.98C129.94 24.04 129.81 24.01 129.75 23.92C129.69 23.83 129.71 23.6999 129.81 23.6399C129.86 23.6299 131 22.88 132.05 23.29C132.15 23.33 132.2 23.4499 132.16 23.5499C132.16 23.5699 132.15 23.59 132.13 23.61L132.14 23.62Z"
                    fill="#263238"
                />
                <path
                    d="M82 92.986H0.00405884C0.00405884 92.986 2.41845 88.128 7.03622 87.7172C11.6581 87.3064 14.6081 90.3496 14.6081 90.3496C14.6081 90.3496 12.4899 82.3966 18.7308 81.579C24.9758 80.7614 25.9699 87.2825 25.9699 87.2825C25.9699 87.2825 26.6395 69.5976 43.7025 71.0893C60.7655 72.581 61.3336 89.9069 61.3336 89.9069C61.3336 89.9069 66.1584 83.6969 72.4114 85.5036C78.6685 87.3104 82 92.986 82 92.986Z"
                    fill="#E0E5FF"
                />
                <g
                    style="mix-blend-mode: multiply"
                    opacity="0.3"
                >
                    <path
                        d="M55.3037 81.6627C50.4425 76.9124 43.4225 76.5574 37.4575 79.3773C33.2699 81.3595 29.9344 84.8694 27.7513 88.9336C26.1079 87.8687 24.2697 87.095 22.3098 86.6802C19.7858 86.1497 17.3593 87.7929 17.3106 90.4253C17.3065 90.7284 17.2822 91.0236 17.2578 91.3227C17.2456 91.3985 17.2091 91.7096 17.1726 91.909C17.128 92.1603 17.0793 92.4116 17.0306 92.6629C16.9048 92.615 16.7749 92.5711 16.6491 92.5272C12.9931 91.243 8.2495 90.6606 4.53255 92.0327C3.83056 92.2919 3.16914 92.611 2.56453 92.9899H0C0 92.9899 2.41439 88.132 7.03217 87.7211C11.654 87.3103 14.604 90.3535 14.604 90.3535C14.604 90.3535 12.4858 82.4005 18.7267 81.5829C24.9717 80.7653 25.9659 87.2864 25.9659 87.2864C25.9659 87.2864 26.6354 69.6015 43.6984 71.0932C60.7615 72.5849 61.3296 89.9108 61.3296 89.9108C61.3296 89.9108 66.1543 83.7008 72.4074 85.5075C78.6685 87.3103 82 92.9859 82 92.9859H81.9635C78.49 89.0852 73.4502 87.083 68.2075 88.0961C65.363 88.6465 62.7863 90.1302 60.6925 92.1164C59.8322 88.2716 58.1685 84.4666 55.3037 81.6627Z"
                        fill="#E0E5FF"
                    />
                </g>
            </svg>
        </div>

        {{-- Left side decoration --}}
        <div class="absolute top-14 left-24 hidden md:block lg:left-40">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-32 lg:w-36"
                viewBox="0 0 181 94"
                fill="none"
            >
                <path
                    d="M71 30.2488H180.995C180.995 30.2488 177.756 23.732 171.561 23.1809C165.361 22.6298 161.404 26.7122 161.404 26.7122C161.404 26.7122 164.245 16.0435 155.873 14.9467C147.496 13.8499 146.162 22.5977 146.162 22.5977C146.162 22.5977 145.264 -1.12584 122.375 0.875198C99.4853 2.87624 98.7232 26.1183 98.7232 26.1183C98.7232 26.1183 92.251 17.7878 83.8627 20.2115C75.469 22.6352 71 30.2488 71 30.2488Z"
                    fill="#E0E5FF"
                />
                <g
                    style="mix-blend-mode: multiply"
                    opacity="0.3"
                >
                    <path
                        d="M106.812 15.0591C113.333 8.68677 122.75 8.21059 130.752 11.9933C136.37 14.6524 140.844 19.3608 143.773 24.8128C145.977 23.3843 148.443 22.3463 151.072 21.7899C154.458 21.0783 157.713 23.2826 157.779 26.8139C157.784 27.2205 157.817 27.6164 157.849 28.0177C157.866 28.1194 157.915 28.5367 157.964 28.8042C158.023 29.1413 158.089 29.4784 158.154 29.8154C158.323 29.7512 158.497 29.6924 158.666 29.6335C163.57 27.9107 169.934 27.1295 174.92 28.9701C175.861 29.3178 176.749 29.7459 177.56 30.2542H181C181 30.2542 177.761 23.7374 171.567 23.1863C165.367 22.6352 161.409 26.7176 161.409 26.7176C161.409 26.7176 164.251 16.0489 155.879 14.9521C147.501 13.8552 146.168 22.6031 146.168 22.6031C146.168 22.6031 145.27 -1.12047 122.38 0.880569C99.4907 2.88161 98.7286 26.1237 98.7286 26.1237C98.7286 26.1237 92.2564 17.7931 83.8682 20.2168C75.469 22.6352 71 30.2488 71 30.2488H71.049C75.7085 25.0161 82.4692 22.3302 89.5021 23.6892C93.3179 24.4276 96.7744 26.4179 99.5832 29.0824C100.737 23.9247 102.969 18.8204 106.812 15.0591Z"
                        fill="#E0E5FF"
                    />
                </g>
                <path
                    d="M16.1908 89.1302C16.1908 89.1302 12.9908 84.4702 9.67077 83.7702C6.35077 83.0702 0.000769712 79.1602 0.000769712 79.1602C0.000769712 79.1602 -0.109231 83.1602 2.30077 85.0302C4.71077 86.9002 9.77077 87.3102 10.7508 90.4002L16.1908 89.1302Z"
                    fill="#407BFF"
                />
                <path
                    opacity="0.6"
                    d="M16.1908 89.1302C16.1908 89.1302 12.9908 84.4702 9.67077 83.7702C6.35077 83.0702 0.000769712 79.1602 0.000769712 79.1602C0.000769712 79.1602 -0.109231 83.1602 2.30077 85.0302C4.71077 86.9002 9.77077 87.3102 10.7508 90.4002L16.1908 89.1302Z"
                    fill="white"
                />
                <path
                    d="M1.92077 81.7102C1.70077 81.1602 2.44077 81.0402 3.36077 81.0902C1.48077 80.0702 0.000769712 79.1602 0.000769712 79.1602C0.000769712 79.1602 -0.109231 83.1602 2.30077 85.0302C3.35077 85.8402 4.89077 86.3702 6.38077 86.9702C2.01077 83.5502 2.45077 83.0402 1.92077 81.7102Z"
                    fill="#263238"
                />
                <path
                    d="M6.85083 90.3C6.85083 90.3 7.41083 88.23 9.88083 88.72C12.3508 89.21 13.8808 88.36 13.8808 88.36C13.8808 88.36 16.3208 83.26 19.4908 82.06C22.6608 80.86 28.3308 76 28.3308 76C28.3308 76 29.0608 79.93 26.9608 82.15C24.8608 84.37 19.9308 85.56 19.4408 88.77L28.6908 91.12C28.6908 91.12 25.0408 91.93 24.8708 92.85C24.7008 93.76 21.1308 93.54 21.1308 93.54L18.2108 92.79C18.2108 92.79 16.7708 94.89 10.4708 91.99C10.4708 91.99 6.05083 92.68 6.83083 90.29L6.85083 90.3Z"
                    fill="#407BFF"
                />
                <path
                    opacity="0.8"
                    d="M6.85083 90.3C6.85083 90.3 7.41083 88.23 9.88083 88.72C12.3508 89.21 13.8808 88.36 13.8808 88.36C13.8808 88.36 16.3208 83.26 19.4908 82.06C22.6608 80.86 28.3308 76 28.3308 76C28.3308 76 29.0608 79.93 26.9608 82.15C24.8608 84.37 19.9308 85.56 19.4408 88.77L28.6908 91.12C28.6908 91.12 25.0408 91.93 24.8708 92.85C24.7008 93.76 21.1308 93.54 21.1308 93.54L18.2108 92.79C18.2108 92.79 16.7708 94.89 10.4708 91.99C10.4708 91.99 6.05083 92.68 6.83083 90.29L6.85083 90.3Z"
                    fill="white"
                />
                <path
                    d="M6.85069 90.2998C6.85069 90.2998 4.39069 91.3998 4.46069 91.7398C4.52069 92.0798 7.28069 91.6998 7.28069 91.6998C7.28069 91.6998 8.13069 90.7898 6.85069 90.2998Z"
                    fill="#407BFF"
                />
                <path
                    d="M26.9608 82.15C29.0608 79.93 28.3308 76 28.3308 76C28.3308 76 27.3608 76.83 26.0108 77.88C26.1208 79.03 26.0808 81.38 24.5508 83.93C25.4808 83.38 26.3408 82.81 26.9608 82.16V82.15Z"
                    fill="#263238"
                />
                <path
                    d="M23.4107 92.24C23.3707 92.66 22.0307 93.15 20.9307 93.49L21.1407 93.54C21.1407 93.54 24.7107 93.76 24.8807 92.85C25.0507 91.94 28.7007 91.12 28.7007 91.12L25.3607 90.27C24.2707 90.93 23.4507 91.83 23.4107 92.23V92.24Z"
                    fill="#263238"
                />
                <path
                    d="M8.46074 89.9702C8.47074 90.2402 8.62075 90.4502 8.80075 90.4502C8.98075 90.4502 9.11075 90.2202 9.10075 89.9502C9.09075 89.6802 8.94075 89.4702 8.76075 89.4702C8.58075 89.4702 8.45074 89.7002 8.46074 89.9702Z"
                    fill="#263238"
                />
                <path
                    d="M8.03079 89.26C8.03079 89.26 8.13079 89.3 8.18079 89.26C8.68079 88.95 9.39079 89.23 9.39079 89.23C9.45079 89.26 9.53079 89.23 9.56079 89.16C9.59079 89.1 9.56079 89.02 9.49079 88.99C9.46079 88.99 8.65079 88.65 8.04079 89.03C7.98079 89.07 7.96079 89.15 8.00079 89.21C8.00079 89.22 8.01079 89.24 8.03079 89.25V89.26Z"
                    fill="#263238"
                />
            </svg>
        </div>

        {{-- Title --}}
        <div
            id="tweets"
            class="grid place-items-center pt-14"
        >
            {{-- Twitter Icon --}}
            <div x-ref="twitter_icon">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-8"
                    viewBox="0 0 35 35"
                    fill="none"
                >
                    <g clip-path="url(#clip0_291_28855)">
                        <mask
                            id="mask0_291_28855"
                            style="mask-type: luminance"
                            maskUnits="userSpaceOnUse"
                            x="0"
                            y="0"
                            width="35"
                            height="35"
                        >
                            <path
                                d="M0 0H35V35H0V0Z"
                                fill="white"
                            />
                        </mask>
                        <g mask="url(#mask0_291_28855)">
                            <path
                                d="M27.5625 1.64014H32.93L21.205 15.0751L35 33.3601H24.2L15.735 22.2726L6.06 33.3601H0.6875L13.2275 18.9851L0 1.64264H11.075L18.715 11.7751L27.5625 1.64014ZM25.675 30.1401H28.65L9.45 4.69264H6.26L25.675 30.1401Z"
                                fill="#0F033A"
                            />
                        </g>
                    </g>
                    <defs>
                        <clipPath id="clip0_291_28855">
                            <rect
                                width="35"
                                height="35"
                                fill="white"
                            />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <h4
                x-ref="community"
                class="relative mt-3 text-xl font-medium tracking-wider"
            >
                Community
                <div
                    x-ref="community_quote"
                    class="absolute -top-2 -right-7"
                >
                    <svg
                        width="21"
                        height="15"
                        class="scale-[.85]"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g
                            clip-path="url(#a)"
                            fill="currentColor"
                        >
                            <path
                                d="m6.185 2.742-.124.238-1.422 1.04.075-.038-1.41.375h.088l-1.26-.037c-.548-.075-.748-.388-.573-.927.524-.413.636-.525.324-.325l3.741-.501c-.15-.075-.187-.075-.1 0 .088.075.063.063-.062-.063-.125-.263 0 .113-.087-.212L.312 4.044c.112.1.137.113.062.05-.125-.1-.112-.237.025-.438l4.913-.976c.125.175-.012-.126-.025-.188.025.188 0-.013.025-.113.038-.163 0-.288 0-.087.113-.15.113-.163 0-.038a.907.907 0 0 1-.324.25l-1.397.476c-.15.025-.299.025-.449.013-.112 0-.46-.138-.112.012.162.075.275.15.487.4.773.902.96 2.405 1.085 3.57.124 1.164.05 2.303-.225 3.48-.075.3-.162.614-.274.902-.038.112-.088.213-.125.313-.187.463.137-.213-.112.225-.137.238-.262.488-.412.726a4.651 4.651 0 0 1-.287.4c-.05.063-.374.427-.112.139-.262.275-.61.65-.499 1.076.113.401.611.627.973.69 1.172.212 2.619-.151 3.53-.953C9.95 11.432 10.45 7.375 9.576 3.782c-.224-.914-.598-1.904-1.272-2.592C7.42.288 6.11-.062 4.838 0 3.28.088 1.434.701.486 2.054-.112 2.918-.187 3.869.4 4.758c.424.651 1.883.476 2.444.363.86-.175 1.958-.563 2.457-1.34.374-.575.449-1.314-.1-1.802-.823-.727-2.22-.489-3.155-.176-.686.238-2.182.927-1.92 1.916.735 2.83 5.337 1.615 6.447-.35.586-1.04-.187-1.741-1.172-1.929-.923-.188-1.983.013-2.831.4-.624.276-1.571.79-1.659 1.578-.112 1.165 1.46 1.252 2.282 1.14.686-.1 1.41-.288 1.996-.676.374-.25.947-.626.997-1.115v-.025ZM17.197 2.742l-.125.238-1.422 1.04.075-.038-1.41.375h.088l-1.26-.037c-.548-.075-.748-.388-.573-.927.524-.413.636-.525.324-.325l3.741-.501c-.15-.075-.187-.075-.1 0 .088.075.063.063-.062-.063-.124-.263 0 .113-.087-.212l-5.088 1.752c.112.1.137.113.062.05-.124-.1-.112-.237.025-.438L16.3 2.68c.124.175-.013-.126-.025-.188.025.188 0-.013.025-.113.037-.163 0-.288 0-.087.112-.15.112-.163 0-.038a.907.907 0 0 1-.325.25l-1.396.476c-.15.025-.3.025-.45.013-.111 0-.46-.138-.111.012.162.075.274.15.486.4.773.902.96 2.405 1.085 3.57.125 1.164.05 2.303-.225 3.48a7.51 7.51 0 0 1-.274.902c-.037.112-.087.213-.125.313-.187.463.137-.213-.112.225-.137.238-.262.488-.412.726a4.643 4.643 0 0 1-.286.4c-.05.063-.374.427-.113.139-.261.275-.61.65-.498 1.076.112.401.61.627.972.69 1.173.212 2.62-.151 3.53-.953 2.893-2.541 3.391-6.598 2.518-10.191-.224-.914-.598-1.904-1.271-2.592C18.418.288 17.108-.062 15.85 0c-1.572.088-3.405.689-4.352 2.054-.599.864-.674 1.815-.088 2.704.424.651 1.883.476 2.444.363.86-.175 1.958-.563 2.457-1.34.374-.575.449-1.314-.1-1.802-.823-.727-2.22-.489-3.155-.176-.698.238-2.194.927-1.945 1.916.736 2.83 5.337 1.615 6.447-.35.586-1.04-.187-1.741-1.172-1.929-.923-.188-1.983.013-2.83.4-.624.276-1.572.79-1.66 1.578-.112 1.165 1.46 1.252 2.283 1.14.685-.1 1.409-.288 1.995-.676.374-.25.948-.626.998-1.115l.024-.025Z"
                            />
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path
                                    fill="#fff"
                                    d="M0 0h21v15H0z"
                                />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </h4>
            <h3 class="relative z-10 inline-grid">
                <div
                    x-ref="feedback_header"
                    class="text-2xl font-extrabold [grid-area:1/-1] lg:text-3xl"
                >
                    Feedback
                </div>
                <div
                    x-ref="feedback_header_underline"
                    class="relative -left-1 -z-10 h-5 w-[98%] self-end justify-self-start bg-[#A1B0FF]/70 [grid-area:1/-1]"
                ></div>
            </h3>
        </div>

        {{-- Testimonial Tweets --}}
        <div
            class="overflow-hidden"
            :class="{
                'max-h-180': !show_more,
            }"
        >
            <div
                class="tweets-parent relative gap-8 px-3 pt-10 transition-all motion-reduce:transition-none sm:columns-2 lg:columns-3 [&_.testimonial-component.not-hovered]:opacity-50"
            >
                <x-home.testimonial
                    url="https://twitter.com/shocm/status/1487841457088045059"
                >
                    Filament has become
                    <strong>one of my required packages</strong>
                    for all my new projects. I talk about it almost as much as I
                    talk about Livewire and
                    <strong>that is a lot</strong>
                    . Thanks for the
                    <strong>great work</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/89408?v=4"
                        twitter-handle="shocm"
                        title="php[architect] Team"
                    >
                        Eric Van Johnson
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/ChrisHardie/status/1507793007470428167"
                >
                    I've built a few Laravel admin tools/sites now with Filament
                    and just have to remark on how
                    <strong>well designed</strong>
                    it is, and how quickly one can create
                    <strong>powerful, friendly</strong>
                    application interfaces with it.
                    <strong>Impressive stuff.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/311772?v=4"
                        twitter-handle="ChrisHardie"
                        title="Laravel developer"
                    >
                        Chris Hardie
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/heyjordn/status/1494428799584329730"
                >
                    <strong>Loving the performance</strong>
                    of Filament's datatable, our team at Orba added an Excel
                    export,
                    <strong>so smooth</strong>
                    🔥
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/4820517?v=4"
                        twitter-handle="heyjordn"
                        title="Laravel developer"
                    >
                        Jordan Jones
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/ralphjsmit/status/1502305847749357572"
                >
                    Filament is a
                    <strong>GREAT</strong>
                    tool for building admin panels in Laravel. It has a great
                    plugin support and an
                    <strong>active community</strong>
                    . 🚀
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/59207045?v=4"
                        twitter-handle="ralphjsmit"
                        title="Laravel developer"
                    >
                        Ralph J. Smit
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial url="https://twitter.com/larsklopstra">
                    Filament is a
                    <strong>great CMS solution</strong>
                    for both technical and non-technical users, and the fluent
                    API is a
                    <strong>developer's dream!</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/25669876?v=4"
                        twitter-handle="larsklopstra"
                        title="Laravel developer"
                    >
                        Lars Klopstra
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/snellingio/status/1491103335793164290"
                >
                    The more I look at it, the closer it is to being able to
                    build a
                    <strong>full SaaS with Filament alone</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/9887585?v=4"
                        twitter-handle="snellingio"
                        title="Laravel developer"
                    >
                        Sam Snelling
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/roniestein/status/1366526433737068546"
                >
                    Release the hounds!!! This project is going to be
                    <strong>my new go-to</strong>
                    for all back-end work!!! So Excited!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/8517475?v=4"
                        twitter-handle="roniestein"
                        title="Laravel developer"
                    >
                        Roni Estein
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/LabsArtisan/status/1368248886725402625"
                >
                    👍 been using it today and I've got to say
                    <strong>it's brilliant.</strong>
                    <x-slot
                        name="author"
                        avatar="https://pbs.twimg.com/profile_images/1294198577833615360/ifwIsmKp_400x400.jpg"
                        twitter-handle="LabsArtisan"
                        title="Laravel developer"
                    >
                        Artisan Labs
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/alexjustesen/status/1496554096777695233"
                >
                    Hot damn Filament
                    <strong>saves sooooo much time</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/1144087?v=4"
                        twitter-handle="alexjustesen"
                        title="Laravel developer"
                    >
                        Alex Justesen
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/HassanZahirnia/status/1669268332418068480"
                >
                    Started my second
                    <strong>Filament</strong>
                    project a while ago. It's the first time in my career that I
                    can sit down and
                    <strong>focus</strong>
                    on
                    <strong>productivity</strong>
                    and what's important, without dealing with
                    <strong>implementation difficulties</strong>
                    and
                    <strong>business logic.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/15275787?v=4"
                        twitter-handle="HassanZahirnia"
                        title="Web designer & developer"
                    >
                        Hassan Zahirnia
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/mrchrxs/status/1491159440250540033"
                >
                    6 months ago,
                    @carre
                    _sam recommended Filament. I was put off because I use Vue
                    not Livewire. Just spent 30 minutes with it, and
                    <strong>WOW</strong>
                    . Definitely pitching this at work!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/10789117?v=4"
                        twitter-handle="mrchrxs"
                        title="Laravel Developer"
                    >
                        Chris
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/andreas_kviby/status/1367824016380166144"
                >
                    What else can you wish for?
                    <strong>Filament rocks</strong>
                    ! This will be my
                    <strong>first choice</strong>
                    when creating adminpanels for clients from this day and
                    forward.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/1666004?v=4"
                        twitter-handle="andreas_kviby"
                        title="Laravel Developer"
                    >
                        Andreas Kviby
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/adamlee_clx/status/1380910055411748868"
                >
                    I absolutely love developing with TALL stack. Filament is
                    going to
                    <strong>save a lot of time</strong>
                    with the overall development process!!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/53559175?v=4"
                        twitter-handle="adamlee_clx"
                        title="Laravel Developer"
                    >
                        Adam Lee
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/DominikGeimer/status/1416114759179571202"
                >
                    I just started using Filament by Dan Harrin, Ryan Chandler
                    and Ryan Scherler.
                    <strong>I am really impressed</strong>
                    . Thank you for that great tool.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/6383607?v=4"
                        twitter-handle="DominikGeimer"
                        title="Laravel Developer"
                    >
                        Dominik Geimer
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/luilliarcec/status/1485764353802608643"
                >
                    Today I tried Filament, and
                    <strong>
                        oh my God, that's fantastic! Amazing! Great job.
                    </strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/27895611?v=4"
                        twitter-handle="luilliarcec"
                        title="Laravel Developer"
                    >
                        Luis Andrés Arce C.
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/nickciolpan/status/1483564450208747520"
                >
                    Filament's admin is, by far,
                    <strong>my favorite Laravel tool</strong>
                    at the moment. Found my gateway drug into Livewire
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/8835763?v=4"
                        twitter-handle="nickciolpan"
                        title="Laravel Developer"
                    >
                        Nick Ciolpan
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/Tiago_Ferat/status/1367996436567179264"
                >
                    An
                    <strong>awesome</strong>
                    Open-Source Admin panel with TALL stack. 👏👏
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/11933789?v=4"
                        twitter-handle="Tiago_Ferat"
                        title="Laravel Developer"
                    >
                        Tiago Rodrigues
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/kiltedup/status/1366526387180482567"
                >
                    Just installed and had a play.
                    <strong>Really great job.</strong>
                    <x-slot
                        name="author"
                        avatar="https://pbs.twimg.com/profile_images/1251922928469446664/IxVNvpzG_400x400.jpg"
                        twitter-handle="kiltedup"
                        title="Laravel Developer"
                    >
                        Dave Walker
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial url="https://twitter.com/iksaku2">
                    Filament is the
                    <strong>
                        Swiss Army Knife dashboard for TALL stack apps
                    </strong>
                    . Just sit down, install and you'll have a full CMS in two
                    shakes.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/4632429?v=4"
                        twitter-handle="iksaku2"
                        title="Laravel Developer"
                    >
                        Jorge González
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/DaronSpence/status/1507602035641929729"
                >
                    Big shoutout to Filament for making a
                    <strong>really slick</strong>
                    admin panel kit.
                    <strong>Loving the markdown editor</strong>
                    w/ builtin file uploads!
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/4062087?v=4"
                        twitter-handle="DaronSpence"
                        title="Laravel Developer"
                    >
                        Daron Spence
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/jacques_van_wyk/status/1507401233937711104"
                >
                    I must say this Filament is
                    <strong>amazing</strong>
                    and such
                    <strong>a pleasure to work with</strong>
                    .
                    @danjharrin
                    you and team have done great job.
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/12008702?v=4"
                        twitter-handle="jacques_van_wyk"
                        title="Laravel Developer"
                    >
                        Jacques van Wyk
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/jimmyaldape/status/1504641233871728640"
                >
                    Filament is a
                    <strong>joy to work with</strong>
                    . Just about covers most use cases for an admin panel in
                    Laravel.
                    <strong>Great job.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/59585840?v=4"
                        twitter-handle="jimmyaldape"
                        title="Laravel Developer"
                    >
                        Jimmy Aldape
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/mattmngdev/status/1495358748445057025"
                >
                    The
                    <strong>highlight of the weekend</strong>
                    : managed to start a new project using Filament and
                    <strong>I love it</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/373999?v=4"
                        twitter-handle="mattmngdev"
                        title="Laravel Developer"
                    >
                        Matteo Mangoni
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/romaldyminaya/status/1492553584587776004"
                >
                    Filament is a
                    <strong>very fun framework</strong>
                    to play with so far. The support is
                    <strong>very accurate and fast</strong>
                    . 😍
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/2809147?v=4"
                        twitter-handle="romaldyminaya"
                        title="Laravel Developer"
                    >
                        Romaldy Minaya
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/BotezatuDima/status/1491026512111226881"
                >
                    Today I installed and played with Filament. Seems to be an
                    <strong>amazing tool for productivity</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/3392129?v=4"
                        twitter-handle="BotezatuDima"
                        title="Laravel Developer"
                    >
                        Dumitru Botezatu
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/nkornel/status/1547530825117360129"
                >
                    We chose Filament and
                    <strong>clients love it</strong>
                    . It is
                    <strong>consistent</strong>
                    and
                    <strong>clean</strong>
                    so the
                    <strong>learning curve is better</strong>
                    .
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/1298094?v=4"
                        twitter-handle="nkornel"
                        title="Laravel Developer"
                    >
                        nKornel
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/theraloss/status/1367975271949864969"
                >
                    Filament is
                    <strong>damn smooth.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/6277291?v=4"
                        twitter-handle="theraloss"
                        title="Laravel Developer"
                    >
                        Danilo Polani
                    </x-slot>
                </x-home.testimonial>
                <x-home.testimonial
                    url="https://twitter.com/mskhoshnazar/status/1423181010850746371"
                >
                    Filament was a
                    <strong>joy to use.</strong>
                    <x-slot
                        name="author"
                        avatar="https://avatars.githubusercontent.com/u/6499685?v=4"
                        twitter-handle="mskhoshnazar"
                        title="Laravel Developer"
                    >
                        Mo Khosh
                    </x-slot>
                </x-home.testimonial>
            </div>

            {{-- See More Button --}}
            <div class="flex justify-center pt-10">
                <a
                    href="https://love.filamentphp.com"
                    target="_blank"
                    class="group/button bg-dawn-pink text-hurricane hover:bg-dawn-pink/70 z-10 flex items-center justify-center gap-3 self-center justify-self-center rounded-xl px-7 py-3 transition duration-200 [grid-area:1/-1] motion-reduce:transition-none"
                >
                    <div>View All Testimonials</div>
                    <div
                        class="transition duration-300 group-hover/button:translate-x-1 motion-reduce:transition-none motion-reduce:group-hover/button:transform-none"
                    >
                        <svg
                            width="24"
                            height="25"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M4 12.992h2.5m13.5 0-6-6m6 6-6 6m6-6H9.5"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
        <script>
            // Custom function to blur (opacity-50) all the testimonial tweets except the one being hovered
            const testimonialComponents = document.querySelectorAll(
                '.testimonial-component',
            )

            function handleTestimonialHover(event) {
                if (reducedMotion) return
                testimonialComponents.forEach((component) => {
                    if (component !== event.currentTarget) {
                        component.classList.add('not-hovered')
                    } else {
                        component.classList.remove('not-hovered')
                    }
                })
            }

            testimonialComponents.forEach((component) => {
                component.addEventListener('mouseenter', handleTestimonialHover)
                component.addEventListener('mouseleave', () => {
                    testimonialComponents.forEach((component) => {
                        component.classList.remove('not-hovered')
                    })
                })
            })
        </script>
    </div>

    {{-- Floating Show More/Less Button --}}
    <div
        class="inset-x-0 bottom-0 z-10 grid w-full select-none"
        :class="{
            'absolute bg-linear-to-t from-cream to-transparent h-60': !show_more,
            'sticky': show_more,
        }"
    >
        <div
            x-on:click="
                () => {
                    show_more = ! show_more
                    if (! show_more) document.getElementById('tweets').scrollIntoView()
                }
            "
            class="bg-evening relative grid cursor-pointer self-end justify-self-center overflow-hidden rounded-full py-4 font-medium text-white transition-all duration-500 ease-in-out hover:bg-indigo-900 motion-reduce:transition-none"
            :class="{
                'w-48': !show_more,
                'xl:translate-x-136 -translate-y-10 w-16 rotate-180': show_more,
            }"
        >
            <div
                class="transition duration-500 motion-reduce:transition-none"
                :class="{
                    'translate-x-7': !show_more,
                    'translate-x-5': show_more,
                }"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="m12 20l6-6m-6 6l-6-6m6 6V9.5M12 4v2.5"
                    />
                </svg>
            </div>
            <div
                class="absolute top-1/2 left-16 -translate-y-1/2 truncate transition duration-500"
                :class="{
                    'opacity-0': show_more,
                }"
            >
                Show more
            </div>
        </div>
    </div>
</div>
