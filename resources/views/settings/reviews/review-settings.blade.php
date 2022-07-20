@extends('spark::layouts.app')


@section('content')
<review-settings :user="user" :review-id="{{ $review->id }}" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <!-- Tabs -->
            <div class="col-md-3">
                <div class="panel panel-default panel-flush">
                    <div class="panel-heading">
                        <span v-if="review">
                            @{{ review.name }} for {{ ucfirst(Spark::teamString()) }} 
                        </span>
                    </div>

                    <div class="panel-body">
                        <div class="spark-settings-tabs">
                            <ul class="nav spark-settings-stacked-tabs" role="tablist">
                                <!-- Owner Settings -->
                                    <li role="presentation" class="active">
                                        <a href="#owner" aria-controls="owner" role="tab" data-toggle="tab">
                                            <i class="fa fa-fw fa-btn fa-edit"></i>Review Details
                                        </a>
                                    </li>

                                <!-- View All Teams -->
                                <li role="presentation">
                                    <a href="/settings#/reviews">
                                        <i class="fa fa-fw fa-btn fa-arrow-left"></i>View All Reviews
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Tab Panels -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- Owner Information -->
                        <div role="tabpanel" class="tab-pane active" id="owner">
                            @include('settings.reviews.review-profile')
                        </div>

                </div>
            </div>
        </div>
    </div>
</review-settings>
@endsection

