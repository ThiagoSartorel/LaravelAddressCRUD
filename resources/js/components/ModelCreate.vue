<template>
    <button @click="modalOpen = true" class="btn-secondary">
        Novo Endereço
    </button>
    <p
                class="fixed rounded-full px-4 py-1 bg-opacity-70 text-white font-semibold bg-purple-600 right-4 bottom-4"
                v-if="msg"
            >
                {{ msg }}
            </p>
    <TransitionRoot as="template" :show="modalOpen">
        <Dialog as="div" class="relative z-10" @close="modalOpen = false">

            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div
                    class="flex mt-20 items-end justify-center p-4  sm:p-0"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                        >
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="flex w-full items-center space-x-2 ">
                                    <div
                                        class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10"
                                    >
                                        <div>
                                            <PlusIcon
                                                class="h-6 w-6 text-blue-600"
                                                aria-hidden="true"
                                            />
                                        </div>
                                    </div>
                                    <DialogTitle
                                        as="h3"
                                        class="text-base font-semibold leading-6 text-gray-900"
                                        >Adicionar novo endereço</DialogTitle
                                    >
                                </div>
                                <div class="flex items-start">
                                    <div
                                        class="mt-3  sm:ml-4 sm:mt-0 sm:text-left w-full"
                                    >
                                        <form
                                            class="mt-2"
                                            @submit.prevent="handleSubmit"
                                            action="{{ route('addresses.store') }}"
                                            method="post"
                                        >
                                            <div class="sm:col-span-2">
                                                <label
                                                    for="postal-code"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >CEP</label
                                                >
                                                <div class="mt-2">
                                                    <input
                                                        type="text"
                                                        name="postal_code"
                                                        id="postal-code"
                                                        v-model="postalCode"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    />
                                                </div>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <label
                                                    for="state"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Estado</label
                                                >
                                                <div class="mt-2">
                                                    <input
                                                        type="text"
                                                        name="state"
                                                        id="state"
                                                        v-model="state"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    />
                                                </div>
                                            </div>

                                            <div
                                                class="sm:col-span-2 sm:col-start-1"
                                            >
                                                <label
                                                    for="city"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Cidade</label
                                                >
                                                <div class="mt-2">
                                                    <input
                                                        type="text"
                                                        name="city"
                                                        id="city"
                                                        v-model="city"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                    />
                                                </div>
                                            </div>

                                            <div
                                                class="col-span-full flex space-x-2"
                                            >
                                                <div class="w-4/5">
                                                    <label
                                                        for="street"
                                                        class="block text-sm font-medium leading-6 text-gray-900"
                                                        >Logradouro</label
                                                    >
                                                    <div class="mt-2">
                                                        <input
                                                            type="text"
                                                            name="street"
                                                            id="street"
                                                            v-model="street"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="w-1/5">
                                                    <label
                                                        for="number"
                                                        class="block text-sm font-medium leading-6 text-gray-900"
                                                        >Número</label
                                                    >
                                                    <div class="mt-2">
                                                        <input
                                                            type="text"
                                                            name="number"
                                                            id="number"
                                                            v-model="number"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="flex flex-col bg-gray-50 py-3 md:flex-row md:justify-between"
                                            >
                                                <button
                                                    type="submit"
                                                    class="mt-4 md:mt-0 order-2 inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:w-auto"
                                                    @click="modalOpen = false"
                                                >
                                                    Salvar
                                                </button>
                                                <button
                                                    type="button"
                                                    class="order-1 mt-3 inline-flex w-full justify-center rounded-md bg-red-700 bg-opacity-90 text-white px-3 py-2 text-sm font-semibold shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600 sm:mt-0 sm:w-auto"
                                                    @click="handleClose"
                                                    ref="cancelButtonRef"
                                                >
                                                    Cancelar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref } from "vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { PlusIcon } from "@heroicons/vue/24/outline";
import axios from "axios";

const modalOpen = ref(false);
const msg = ref(false);
const postalCode = ref("");
const state = ref("");
const city = ref("");
const street = ref("");
const number = ref("");

const handleClose= async () => {
    postalCode.value = "";
    state.value = "";
    city.value = "";
    street.value = "";
    number.value = "";
    modalOpen.value = false;
}

const handleSubmit = async () => {
    const formData = new FormData();
    formData.append("postal_code", postalCode.value);
    formData.append("state", state.value);
    formData.append("city", city.value);
    formData.append("street", street.value);
    formData.append("number", number.value);

    try {
        await axios.post("/addresses", formData);
        msg.value = "Sucesso ao Criar! Aguarde";
    } catch (error) {
        msg.value = "Ocorreu um erro ao Criar! Aguarde";
    }
    modalOpen.value = false;
    
    setTimeout(() => {
        window.location.reload();
    }, 3000); 
};
</script>
