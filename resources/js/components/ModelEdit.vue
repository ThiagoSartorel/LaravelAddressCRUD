<template>
    <p @click="modalOpen = true" class="text-end cursor-pointer">Editar</p>

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
                ></div>
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
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
                                <div class="flex w-full items-center space-x-2">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10"
                                    >
                                        <div>
                                            <ClipboardIcon
                                                class="h-6 w-6 text-blue-600"
                                                aria-hidden="true"
                                            />
                                        </div>
                                    </div>
                                    <DialogTitle
                                        as="h3"
                                        class="text-base font-semibold leading-6 text-gray-900"
                                        >Editar endereço</DialogTitle
                                    >
                                </div>
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full"
                                    >
                                        <form
                                            id="form"
                                            class="mt-2"
                                            @submit.prevent="handleSubmit"
                                            :action="
                                                '/addresses/' + addressData.id
                                            "
                                            method="post"
                                        >
                                            <input
                                                hidden
                                                type="text"
                                                name="id"
                                                :value="addressData.id"
                                            />

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
                                                        v-model="
                                                            addressData.postal_code
                                                        "
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
                                                        v-model="
                                                            addressData.state
                                                        "
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
                                                        v-model="
                                                            addressData.city
                                                        "
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
                                                            v-model="
                                                                addressData.street
                                                            "
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
                                                            v-model="
                                                                addressData.number
                                                            "
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="bg-gray-50 py-3 sm:flex sm:flex-row-reverse justify-between"
                                            >
                                                <button
                                                    type="submit"
                                                    class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:w-auto"
                                                >
                                                    Salvar
                                                </button>
                                                <button
                                                    type="button"
                                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-red-700 bg-opacity-90 text-white px-3 py-2 text-sm font-semibold shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600 sm:mt-0 sm:w-auto"
                                                    @click="modalOpen = false"
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
import { ref, defineProps, onMounted } from "vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { ClipboardIcon } from "@heroicons/vue/24/outline";
import axios from "axios";

const modalOpen = ref(false);
const id = ref("");
const postalCode = ref("");
const state = ref("");
const city = ref("");
const street = ref("");
const number = ref("");
const msg = ref("");

const props = defineProps({
    addressData: Object,
});

onMounted(() => {
    id.value = props.addressData.id;
    postalCode.value = props.addressData.postal_code;
    state.value = props.addressData.state;
    city.value = props.addressData.city;
    street.value = props.addressData.street;
    number.value = props.addressData.number;
});

const handleSubmit = async () => {
    const formData = new FormData();
    const newPostal_code = document.getElementById("postal-code").value;
    const newState = document.getElementById("state").value;
    const newCity = document.getElementById("city").value;
    const newStreet = document.getElementById("street").value;
    const newNumber = document.getElementById("number").value;

    formData.append("postal_code", newPostal_code);
    formData.append("state", newState);
    formData.append("city", newCity);
    formData.append("street", newStreet);
    formData.append("number", newNumber);

    try {
        await axios.post("/addresses/" + id.value, formData, {
            headers: {
                "X-HTTP-Method-Override": "PUT",
            },
        });
        msg.value = "Sucesso ao editar! Aguarde";
    } catch (error) {
        msg.value = "Ocorreu um erro ao editar! Aguarde";
    }
    modalOpen.value = false;

    setTimeout(() => {
        window.location.reload();
    }, 3000);
};
</script>
