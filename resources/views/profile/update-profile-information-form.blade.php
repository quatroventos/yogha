<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="Foto do perfil" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    Nova foto
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        Remover foto
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="Nome" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="surname" value="Sobrenome" />
            <x-jet-input id="surname" type="text" class="mt-1 block w-full" wire:model.defer="state.surname" autocomplete="surname" />
            <x-jet-input-error for="surname" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="Telefone" />
            <x-jet-input id="phone" type="phone" class="mt-1 block w-full" wire:model.defer="state.phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birthday" value="Aniversário" />
            <x-jet-input id="birthday" type="birthday" class="mt-1 block w-full" wire:model.defer="state.birthday" />
            <x-jet-input-error for="birthday" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cpf" value="CPF" />
            <x-jet-input id="cpf" type="cpf" class="mt-1 block w-full" wire:model.defer="state.cpf" />
            <x-jet-input-error for="cpf" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="zip_code" value="CEP" />
            <x-jet-input id="zip_code" type="zip_code" class="mt-1 block w-full" wire:model.defer="state.zip_code" />
            <x-jet-input-error for="zip_code" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="street" value="Rua" />
            <x-jet-input id="street" type="street" class="mt-1 block w-full" wire:model.defer="state.street" />
            <x-jet-input-error for="street" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="number" value="Número" />
            <x-jet-input id="number" type="number" class="mt-1 block w-full" wire:model.defer="state.number" />
            <x-jet-input-error for="number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="complement" value="Número" />
            <x-jet-input id="complement" type="complement" class="mt-1 block w-full" wire:model.defer="state.complement" />
            <x-jet-input-error for="complement" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="district" value="Bairro" />
            <x-jet-input id="district" type="district" class="mt-1 block w-full" wire:model.defer="state.district" />
            <x-jet-input-error for="district" class="mt-2" />
        </div>


        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="País" />
            <select name="country" id="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"  required >
                <option>Carregando...</option>
            </select>
            <x-jet-input-error for="country" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state" value="País" />
            <select name="state" id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"  >
                <option>Selecione um país</option>
            </select>
            <x-jet-input-error for="state" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="Cidade" />
            <select name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  >
                <option>Selecione um estado</option>
            </select>
            <x-jet-input-error for="city" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>



<!-- Masks -->
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>

<script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    $("body").on("change", ".image", function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 450,
            height: 450,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $('#imageBlob').val(base64data);
                $('#profile_pic').attr('src', base64data);
                $modal.modal('hide');
            }
        });
    })

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
</script>

<script>
    $(document).ready(function(){

        $.ajax({
            type:'GET',
            url:'/countries/',
            success:function(html){
                $('#country').html(html);
                $('#country').html(html).delay( 200 ).val(1);
            }
        });


        @if(isset($user))
        $.ajax({
            type:'GET',
            url:'/countries/',
            success:function(html){
                $('#country').html(html).delay( 200 ).val({{$user->country_id}});
            }
        });
        $.ajax({
            type:'GET',
            url:'/states/{{$user->country_id}}',
            success:function(html){
                $('#state').html(html).delay( 200 ).val({{$user->state_id}});
            }
        });
        $.ajax({
            type:'GET',
            url:'/cities/{{$user->state_id}}',
            success:function(html){
                $('#city').html(html).delay( 200 ).val({{$user->city_id}});
            }
        });
        @else
        $.ajax({
            type:'GET',
            url:'/states/1',
            success:function(html){
                $('#state').html(html);
                $('#city').html('<option value="">Selecione um estado</option>');
            }
        });
        @endif


        $('#country').on('change', function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'GET',
                    url:'/states/'+countryID,
                    success:function(html){
                        $('#state').html(html);
                        $('#city').html('<option value="">Selecione um estado</option>');
                    }
                });
            }else{
                $('#state').html('<option value="">Selecione um país</option>');
                $('#city').html('<option value="">Selecione um estado </option>');
            }
        });
    });

    $(function() {
        $(document).delegate('#state', 'change', function() {
            var stateID = $('#state').val();
            $('#city').load('/cities/' + stateID );
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 00000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });
</script>

<script type="text/javascript">
    $("#cep").focusout(function(){
        $.ajax({
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            dataType: 'json',
            success: function(resposta){
                console.log('resposta correios'+resposta.uf);
                $("#logradouro").val(resposta.logradouro);
                $("#complemento").val(resposta.complemento);
                $("#bairro").val(resposta.bairro);
                $("#state option[rel='"+resposta.uf+"']").prop('selected', true)
                var stateID = $('#state').val();
                console.log('-----'+stateID);
                $('#city').load('/cities/' + stateID, function(){
                    $("#city option[rel='"+resposta.localidade+"']").prop('selected', true)
                });
                $("#numero").focus();
            }
        });
    });
</script>
