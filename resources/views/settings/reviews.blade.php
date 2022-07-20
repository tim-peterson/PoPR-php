<reviews :user="user" :teams="teams" inline-template>
    <div>
        <!-- Create Review -->
            @include('settings.reviews.create-review')

        <!-- Current Teams -->
        
            @include('settings.reviews.current-reviews')
    </div>
</reviews>





