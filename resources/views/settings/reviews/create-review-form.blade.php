<!-- Name -->
<div class="form-group" :class="{'has-error': form.errors.has('name')}">
    <label class="control-label">Review Summary <small> (Provide most salient information.)</small></label>


    <input type="text" class="form-control" name="name" v-model="form.name">

    <span class="help-block" v-show="form.errors.has('name')">
        @{{ form.errors.get('name') }}
    </span>

</div>


<div class="row">
    <div class="form-group col-md-6" :class="{'has-error': form.errors.has('originality')}">
        <label class="control-label"> How original is this work? <br><small> 1=least, 10 = most</small></label>

        <select id="create-review-originality" class="form-control" name="originality" v-model="form.originality">
            <option value="-- Choose --" >-- Choose --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>  
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>                           
        </select>

        <span class="help-block" v-show="form.errors.has('originality')">
            @{{ form.errors.get('originality') }}
        </span>
    </div> 


    <div class="form-group col-md-6" :class="{'has-error': form.errors.has('rigor')}">
        <label class="control-label"> How rigorously done was this work? <br><small> 1=least, 10 = most</small></label>

        <select id="create-review-rigor" class="form-control" name="rigor" v-model="form.rigor">
            <option value="-- Choose --" >-- Choose --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>  
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>                           
        </select>

        <span class="help-block" v-show="form.errors.has('rigor')">
            @{{ form.errors.get('rigor') }}
        </span>
    </div> 
</div>

<div class="row">
<div class="form-group col-md-6" :class="{'has-error': form.errors.has('impact')}">
    <label class="control-label"> Rate the impact of this work. <br><small> 1=least, 10 = most</small></label>

    <select id="create-review-impact" class="form-control" name="impact" v-model="form.impact" >
        <option value="-- Choose --" >-- Choose --</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>  
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>                           
    </select>

    <span class="help-block" v-show="form.errors.has('impact')">
        @{{ form.errors.get('impact') }}
    </span>
</div> 


<div class="form-group col-md-6" :class="{'has-error': form.errors.has('accept')}">
    <label class="control-label"> Should TR accept this manuscript? <br><small> Yes or No.</small></label>

    <select id="create-review-accept" class="form-control" name="accept" v-model="form.accept">
        <option value="-- Choose --" >-- Choose --</option>
        <option value="1">Yes</option>
        <option value="0">No</option>                         
    </select>

    <span class="help-block" v-show="form.errors.has('accept')">
        @{{ form.errors.get('accept') }}
    </span>
</div> 

</div>


<div class="form-group" :class="{'has-error': form.errors.has('description')}">
    <label class="control-label"> Comments</label>

    <textarea rows="16" id="create-review-description" class="form-control" name="description" v-model="form.description"></textarea>

    <span class="help-block" v-show="form.errors.has('description')">
        @{{ form.errors.get('description') }}
    </span>
</div> 