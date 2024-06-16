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
                    اطلاعات و تصاویر
                </div>
            </div>
            <div class="step {{$projectSectionNumber >= 2 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(2)">2</span>
                </div>
                <div class="step-label">
                    امکانات و نقشه ها
                </div>
            </div>
            <div class="step {{$projectSectionNumber >= 3 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(3)">3</span>
                </div>
                <div class="step-label">
                    اطلاعات تماس
                </div>
            </div>
            <div class="step {{$projectSectionNumber >= 4 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number {{$isNavItemActive ? 'zisaz-psite-navigation-btn' : ''}}" wire:click="navigate(4)">4</span>
                </div>
                <div class="step-label">
                    ویدئو
                </div>
            </div>
        </div>
    </div>
</div>