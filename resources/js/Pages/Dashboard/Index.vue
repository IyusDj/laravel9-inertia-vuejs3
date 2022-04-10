<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 rounded-3 shadow-sm">
                <div class="card-body text-center">
                    Welcome <strong>{{ auth.user.name }}</strong>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // Import layout App
    import LayoutApp from '../../Layouts/App.vue';

    export default {
        // Set layout
        layout: LayoutApp,

        // Get props
        props: {
            auth: Object
        },
    }
</script>

<style>

</style>