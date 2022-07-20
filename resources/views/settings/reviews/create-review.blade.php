<create-review :user="user" :team="team" inline-template>
<div>
                <div class="panel panel-default">
                    <div class="panel-heading">Create Review for {{--<a href="{{ Auth::user()->currentTeam->photo_url }}"><em>{{ Auth::user()->currentTeam->name --}}</em></a> }}</div>

                    <div class="panel-body">

                        <form  role="form">

                            @include('settings.reviews.create-review-form')
                            
                            <!-- Create Button -->
                            <div class="form-group">
                            
                                    <button type="submit" class="btn btn-primary"
                                            @click.prevent="create"
                                            :disabled="form.busy">

                                        Create
                                    </button>
                         
                            </div>
                        </form>
                    </div>
                </div>

                

</div>
</create-review>