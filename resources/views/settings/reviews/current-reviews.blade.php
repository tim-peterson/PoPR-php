<current-reviews :user="user" :team="team" :review="review" inline-template>
        <!-- Current Reviews -->
        <div  v-show="reviews.length > 0">
 
                <div class="panel panel-default">
                    <div class="panel-heading">Current Reviews</div>

                    <div class="panel-body">
                        <table class="table table-borderless m-b-none">
                            <thead>
                                <th>Name</th>
                                <th></th>
                            </thead>

                            <tbody>
                                <tr v-for="review in reviews">
                                    <!-- Name -->
                                    <td>
                                        <div class="btn-table-align">
                                            <a :href="'/api/reviews/' + review.id"> @{{ review.name }} </a>
                                        </div>
                                    </td>

                                    <!-- Delete Button -->
                                    <td>
                                        <button class="btn btn-danger" @click="deleteReview(review)" style="border-color:transparent;padding-top: 0;">
                                            <i class="fa fa-check"></i>Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    
</current-reviews>
