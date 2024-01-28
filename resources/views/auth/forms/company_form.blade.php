<script>
    function newCompany(){
        document.getElementById('new').classList.remove("hidden");
        document.getElementById('existing').classList.add("hidden");
        document.getElementById('select_existing').classList.remove("hidden");
        document.getElementById('select_new').classList.add("hidden");
        document.getElementById('company_name').required = true;
        document.getElementById('cnpj').required = true;
        document.getElementById('existing_company_name').required = false;
        document.getElementById('existing_company_name').value = null;
        document.getElementById('company_id').value = null;
    }

    function existingCompany(){
        document.getElementById('new').classList.add("hidden");
        document.getElementById('existing').classList.remove("hidden");
        document.getElementById('select_existing').classList.add("hidden");
        document.getElementById('select_new').classList.remove("hidden");
        document.getElementById('company_name').required = false;
        document.getElementById('cnpj').required = false;
        document.getElementById('company_name').value = null;
        document.getElementById('cnpj').value = null;
        document.getElementById('existing_company_name').required = true;
    }

    function updateCompanyId() {
        var input = document.getElementById('existing_company_name');
        var hiddenField = document.getElementById('company_id');
        var datalist = document.getElementById('company_datalist');
        var selectedOption = datalist.querySelector('option[value="' + input.value + '"]');

        if (selectedOption) {
            var companyId = selectedOption.getAttribute('data-id');
            hiddenField.value = companyId;
        } else {
            // Limpar o valor se a opção selecionada não existir (evitar valores incorretos)
            hiddenField.value = null;
        }
    }
</script>

<fieldset name="company">
    <div id="step1">
        <div id="new">
            <h1 class="mt-2 mb-4 text-lg font-bold text-blue-600">Cadastrar empresa</h1>
            <div class="mb-4">
                <label for="company_name" class="block mb-2 text-sm font-bold text-gray-700">Nome da Empresa</label>
                <input type="text" name="company_name" id="company_name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="cnpj" class="block mb-2 text-sm font-bold text-gray-700">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
            </div>
        </div>
        <div id="existing" class="hidden">
            <h1 class="mt-2 mb-4 text-lg font-bold text-blue-600">
                Vincular-se a uma empresa existente
            </h1>
            <div class="mb-4 form-group">
                <input
                    id="existing_company_name" name="existing_company_name" type="text" list="company_datalist"
                    class="w-full px-3 py-2 border border-gray-300 rounded form-control focus:outline-none focus:border-indigo-500"
                    placeholder="Digite o nome da empresa" onchange="updateCompanyId()"
                >
                <input id="company_id" name="company_id" type="hidden">
                <datalist id="company_datalist">
                    @foreach($companies as $company)
                        <option data-id="{{$company->id}}" value="{{$company->company_name}}">{{$company->company_name}}</option>
                    @endforeach
                </datalist>
            </div>
        </div>
        <div class="mb-4 text-center">
            <span class="block text-gray-500 ">ou</span>
            <a id="select_existing" href="javascript:void(0)" onclick="existingCompany()" class="text-blue-600 hover:underline">
                Vincular-se a uma empresa existente
            </a>
            <a id="select_new" href="javascript:void(0)" onclick="newCompany()" class="hidden text-blue-600 hover:underline">
                Cadastrar uma nova empresa
            </a>
        </div>
    </div>
</fieldset>
