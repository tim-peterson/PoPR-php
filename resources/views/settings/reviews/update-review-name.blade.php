<update-review-name :user="user" :team="team" :review="{{ $review }}" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading" style="padding-left:0">Update Review for <a href="{{ Auth::user()->currentTeam->photo_url }}"><em>{{ Auth::user()->currentTeam->name }}</em></a></div>

        <div class="panel-body">
            <!-- Success Message -->


            <form class="" role="form">

                @include('settings.reviews.create-review-form')
                
                <!-- Update Button -->
                <div class="form-group" style="margin-top: 3rem;">
                  
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Update
                        </button>
                
                </div>

                <div class="alert alert-success" v-if="form.successful">
                    Your Review has been updated.
                </div>

            </form>
        </div>
    </div>
</update-review-name>
