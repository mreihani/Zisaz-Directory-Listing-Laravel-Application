<div>
    <div class="bg-light rounded-3 py-4 px-md-4 mb-3">
        <div class="steps pt-4 pb-1">
            <div class="step active">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(1)">1</span>
                </div>
                <div class="step-label">
                    هدر وبسایت
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 2 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(2)">2</ style="cursor: pointer;">
                </div>
                <div class="step-label">
                    درباره ما
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 3 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(3)">3</span>
                </div>
                <div class="step-label">
                    خدمات ما
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 4 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(4)">4</span>
                </div>
                <div class="step-label">
                    ویدئوی تبلیغاتی
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 5 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(5)">5</span>
                </div>
                <div class="step-label">
                    پروژه ها
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 6 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(6)">6</span>
                </div>
                <div class="step-label">
                    آگهی ها
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 7 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(7)">7</span>
                </div>
                <div class="step-label">
                    مجوز ها
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 8 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(8)">8</span>
                </div>
                <div class="step-label">
                    همکاران ما
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 9 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(9)">9</span>
                </div>
                <div class="step-label">
                    بنر میانی
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 10 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(10)">10</span>
                </div>
                <div class="step-label">
                    نظرات
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 11 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(11)">11</span>
                </div>
                <div class="step-label">
                    مقالات
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 12 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(12)">12</span>
                </div>
                <div class="step-label">
                    مشتریان ما
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 13 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(13)">13</span>
                </div>
                <div class="step-label">
                    تماس با ما
                </div>
            </div>
            <div class="step {{$privateSiteSectionNumber >= 14 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(14)">14</span>
                </div>
                <div class="step-label">
                    فوتر وبسایت
                </div>
            </div>
        </div>
    </div>
</div>