<fieldset name="person">
    <div id="step2" class="hidden">
        <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Nome</label>
            <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="cellphone" pattern="[0-9]{9}" class="block mb-2 text-sm font-bold text-gray-700">Telefone</label>
            <input type="tel" name="cellphone" id="cellphone" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block mb-2 text-sm font-bold text-gray-700">Cargo</label>
            <input type="text" name="role" id="role" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
        </div>
    </div>
</fieldset>
