<template>
    <ion-header class="header">
        <ion-grid>
            <ion-row size="auto">
                <ion-col size="auto">
                    <task-filter v-if="menu"/>
                    <!--<ion-icon v-if="menu" @click="this.$router.back()" :icon="require(`@/../resources/icon_filter.svg`)"/>-->
                    <ion-icon v-else @click="this.$router.back()" :icon="chevronBackOutline"/>
                </ion-col>
                <ion-col>
                    <ion-title color="#989AA2">{{ title }}</ion-title>
                </ion-col>
                <ion-col size="auto">
                    <ion-icon v-if="menu" :icon="require(`@/../resources/icon_notifications.svg`)"/>
                </ion-col>
            </ion-row>
        </ion-grid>
    </ion-header>
</template>

<script>
import { chevronBackOutline } from 'ionicons/icons';
import { defineComponent } from 'vue';
import TaskFilter from '../components/TaskFilter.vue';
export default defineComponent( {
    name: "TopBar",
    components: { TaskFilter },
    props: {
        title: String,
        menu: Boolean
    },
    setup() {
        return { chevronBackOutline };
    }
})
</script>

<style scoped>
.header {
    color: #989AA2;
    background-color: white;
    font-family: 'Noto Sans', sans-serif;
    font-size: 18px !important;
    padding: 16px
}

ion-icon {
    color: black;
    width: 24px;
    height: 24px;
    float: left !important;
}
</style>