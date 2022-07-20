<spark-create-review inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">Write Review</div>

        <div class="panel-body">
            <form class="" role="form" v-if="canCreateMoreReviews">
                <!-- Name -->
                <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                    <label class="control-label">Title</label>

                   
                        <input type="text" id="create-review-name" class="form-control" name="name" v-model="form.name">

                        <span class="help-block" v-if="hasReviewLimit">
                            You currently have @{{ remainingReviews }} {{ str_plural(Spark::teamString()) }} remaining.
                        </span>

                        <span class="help-block" v-show="form.errors.has('name')">
                            @{{ form.errors.get('name') }}
                        </span>
                    
                </div>

                <div class="form-group" :class="{'has-error': form.errors.has('keywords')}">
                    <label class="control-label">Keywords <small class="text-muted">This help us find reviewers</small></label>

                  
                        <input type="text" id="create-review-keywords" class="form-control" keywords="keywords" v-model="form.keywords">


                        <span class="help-block" v-show="form.errors.has('keywords')">
                            @{{ form.errors.get('keywords') }}
                        </span>
                  
                </div>


                <div class="form-group" :class="{'has-error': form.errors.has('description_lay')}">
                    <label class="control-label"> Lay Description</label>

                    <textarea id="create-review-description_lay" class="form-control" name="name" v-model="form.description_lay"></textarea>

                    <span class="help-block" v-show="form.errors.has('name')">
                        @{{ form.errors.get('description_lay') }}
                    </span>
                </div> 

                <div class="form-group" :class="{'has-error': form.errors.has('description')}">
                    <label class="control-label"> Description</label>

                    <textarea id="create-review-description" class="form-control" name="name" v-model="form.description"></textarea>

                    <span class="help-block" v-show="form.errors.has('name')">
                        @{{ form.errors.get('description') }}
                    </span>
                </div> 


                @if (Spark::teamsIdentifiedByPath())
                <!-- Slug (Only Shown When Using Paths For Reviews) -->
                <div class="form-group" :class="{'has-error': form.errors.has('slug')}">
                    <label class="control-label">{{ ucfirst(Spark::teamString()) }} Slug</label>

                 
                        <input type="text" id="create-review-slug" class="form-control" name="slug" v-model="form.slug">

                        <p class="help-block" v-show=" ! form.errors.has('slug')">
                            This slug is used to identify your review in URLs.
                        </p>

                        <span class="help-block" v-show="form.errors.has('slug')">
                            @{{ form.errors.get('slug') }}
                        </span>
                
                </div>
                @endif

                <!-- Create Button -->
                <div class="form-group">
                   
                    <button type="submit" style="margin-left:0" class="btn btn-primary btn-lg"
                            @click.prevent="create"
                            :disabled="form.busy">

                        Submit Manuscript Details
                    </button>

                    <small class="text-muted" style="padding-left: 1rem;">NEXT: Add manuscript files...</small>
                  
                </div>
            </form>

            <div v-else>
                <span class="text-danger">
                    Your current plan doesn't allow you to create more reviews, please <a href="{{ url('/settings#/subscription') }}">upgrade your subscription</a>.
                </span>
            </div>
        </div>
    </div>
</spark-create-review>
