<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
            <div class="container">
                <Link v-if="auth.user" class="navbar-brand" href="/dashboard">DJ-YUZ | Inertia Auth</Link>
                <h1 v-else class="navbar-brand">DJ-YUZ | Inertia Auth</h1>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul v-if="auth.user" class="navbar-nav me-auto mb-2 mb-md-0 mr-0">
                        <li class="nav-item">
                            <Link class="nav-link" href="/dashboard">Dashboard</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/logout" method="POST">Logout</Link>
                        </li>
                    </ul>
                    <ul v-else class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <Link class="nav-link" href="/login">Login</Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" href="/register">Register</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container mt-5">
            <slot />
        </main>
    </div>
</template>

<script>
    // Import Link from inertia
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        // Register Link on component
        components: {
            Link
        },

        // Get props
        props: {
            auth: Object
        }

    }
</script>

<style scoped>
    .navbar-brand {
        color: #008080;
    }
    .mt-5 {
        margin-top: 120px !important;
    }
</style>