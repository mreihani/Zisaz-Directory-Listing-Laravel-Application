<div>
    <div class="bg-light rounded-3 py-4 px-md-4 mb-3">
        <div class="steps pt-4 pb-1">
            <div class="step {{ $resumeSectionNumber == 2 ? 'active' : ''}} {{ $resumeSectionNumber == 3 ? 'active' : ''}} {{ $resumeSectionNumber == 4 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number">1</span>
                </div>
                <div class="step-label">
                    اطلاعات فردی
                </div>
            </div>
            <div class="step {{ $resumeSectionNumber == 3 ? 'active' : ''}} {{ $resumeSectionNumber == 4 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number">2</span>
                </div>
                <div class="step-label">سوابق تحصیلی</div>
            </div>
            <div class="step {{ $resumeSectionNumber == 4 ? 'active' : ''}}">
                <div class="step-progress">
                    <span class="step-progress-start"></span>
                    <span class="step-progress-end"></span>
                    <span class="step-number">3</span>
                </div>
                <div class="step-label">سوابق شغلی</div>
            </div>           
        </div>
    </div>
</div>