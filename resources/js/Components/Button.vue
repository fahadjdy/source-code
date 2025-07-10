<template>
    <button class="fhdBtn" :type="props.type">{{props.label}} </button>
</template>
<script setup>
    const props = defineProps({
    label: {
        type: String,
        required: true,
        default: 'Button'
    },
    type: {
        type: String,
        default: 'button'
    }
    })
</script>
<style scoped>
.fhdBtn{
    background: #380101;
    color: #fff;
    padding: 4px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: inset 0 0 0 0 #380101;
}
</style>