<script>

    // ======================================== size =========================================================
        $(document).on("click" , ".add-input-size", function(){
            $(".main-size").append(
                `

                    <div class="col-md-6 col-12 mb-3 parent-size">

                        <div class="sub-main-size">
                            <label for="size">{{ __('models.size') }}</label>
                                <input type="text" id="size" class="form-control" name="size[]"
                                    value="{{ old('size') }}" required/>
                        </div>
                        <div class="remove-input-size">
                            <span> <i class="fa-solid fa-minus"></i> </span>
                        </div>
                    </div>

                `
            )

        });

        $(document).on('click' , ".remove-input-size" , function(){
            $(this).parent(".parent-size").remove();
        })



    // ======================================== weight =========================================================



        $(document).on("click" , ".add-input-weight", function(){
            $(".main-weight").append(
                `

                    <div class="col-md-6 col-12 mb-3 parent-weight">

                        <div class="sub-main-weight">
                            <label for="weight">{{ __('models.weight') }}</label>
                                <input type="text" id="weight" class="form-control" name="weight[]"
                                    value="{{ old('weight') }}" required/>
                        </div>
                        <div class="remove-input-weight">
                            <span> <i class="fa-solid fa-minus"></i> </span>
                        </div>
                    </div>

                `
            )

        });

        $(document).on('click' , ".remove-input-weight" , function(){
            $(this).parent(".parent-weight").remove();
        })

    // ======================================== color =========================================================
        $(document).on("click" , ".add-input-color", function(){
            $(".main-color").append(
                `

                    <div class="col-md-6 col-12 mb-3 parent-color">

                        <div class="sub-main-color">
                            <label for="color">{{ __('models.color') }}</label>
                                <input type="text" id="color" class="form-control" name="color[]"
                                    value="{{ old('color') }}" required/>
                        </div>
                        <div class="remove-input-color">
                            <span> <i class="fa-solid fa-minus"></i> </span>
                        </div>
                    </div>

                `
            )

        });

        $(document).on('click' , ".remove-input-color" , function(){
            $(this).parent(".parent-color").remove();
        })












</script>
