import './bootstrap';

import { createApp } from 'vue';
import ModelCreate from './components/ModelCreate.vue'
import ModelEdit from './components/ModelEdit.vue'


const app = createApp();
app.component('modeledit', ModelEdit)
app.component('modelcreate', ModelCreate)
app.mount('#app')