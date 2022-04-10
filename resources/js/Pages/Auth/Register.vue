<template>
	<div class="container-fluid">
		<div class="row main-content-reg bg-success text-center">
			<div class="col-md-4 text-center company__info-reg">
				<span class="company__logo-reg"><h2><span class="fa fa-android"></span></h2></span>
				<h5 class="company_title-reg">Your Company Logo</h5>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 register_form">
				<div class="container-fluid mb-4  mt-5">
					<div class="row">
						<h2>R E G I S T E R</h2>
					</div>
					<div class="row">
						<form @submit.prevent="storeRegister">

                            <div class="row">
								<input type="text" name="name" id="name" class="form__input" v-model="form.name"  placeholder="Full Name">
							</div>
                            <div v-if="errors.name" class="alert alert-danger">
                                {{ errors.name }}
                            </div>

							<div class="row">
								<input type="email" name="email" id="email" class="form__input" v-model="form.email"  placeholder="Email Address">
							</div>
							<div v-if="errors.email" class="alert alert-danger">
								{{ errors.email }}
							</div>

							<div class="row">
								<input type="password" name="password" id="password" class="form__input" v-model="form.password" placeholder="Password">
							</div>
							<div v-if="errors.password" class="alert alert-danger">
								{{ errors.password }}
							</div>
                            <div class="row">
								<input type="password" name="password" id="password" class="form__input" v-model="form.password_confirmation" placeholder="Password Confirmation">
							</div>
							<div v-if="errors.password" class="alert alert-danger">
								{{ errors.password }}
							</div>

							<div class="row">
								<button type="submit" class="btn">Register</button>
							</div>

						</form>
					</div>
					<div class="row">
						<p>Have an account? <Link href="/login">Login Here</Link></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</template>

<script>
    // Import layout App
    import LayoutApp from '../../Layouts/App.vue';

    // Import Link from inertia
    import { Link } from '@inertiajs/inertia-vue3';

    // Import reactivity API dari vue
    import { reactive } from 'vue';

    // Import inertia adapter
    import { Inertia } from '@inertiajs/inertia';

    export default {
		// Register Link on component
        components: {
            Link
        },

        // Set layout
        layout: LayoutApp,

        // Get props
        props: {
            errors: Object
        },

        // Define composition API
        setup() {
            // Define state
            const form = reactive({
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            });

            // Method storeRegister
            const storeRegister = () => {

                // Send data ke server
                Inertia.post('/register', {
                    name: form.name,
                    email: form.email,
                    password: form.password,
                    password_confirmation: form.password_confirmation

                });

            }

            return {
                form,
                storeRegister
            }

        }
    }
</script>

<style scope>
.main-content-reg{
	width: 50%;
	border-radius: 20px;
	box-shadow: 0 5px 5px rgba(0,0,0,.4);
	margin: -2em auto;
	display: flex;
}
.company__info-reg{
	background-color: #008080;
	border-top-left-radius: 20px;
	border-bottom-left-radius: 20px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	color: #fff;
}
.fa-android{
	font-size:3em;
}


@media screen and (max-width: 640px) {
	.main-content-reg{width: 90%;}
	.company__info-reg{
		display: none;
	}
	.register_form{
		border-top-left-radius:20px;
		border-bottom-left-radius:20px;
	}
}
@media screen and (min-width: 642px) and (max-width:800px){
	.main-content-reg{width: 70%;}
}


.row > h2{
	color:#008080;
}
.register_form{
	background-color: #fff;
	border-top-right-radius:20px;
	border-bottom-right-radius:20px;
	border-top:1px solid #ccc;
	border-right:1px solid #ccc;
}
form{
	padding: 0 2em;
}
.form__input{
	width: 100%;
	border:0px solid transparent;
	border-radius: 0;
	border-bottom: 1px solid #aaa;
	padding-left: 2em;
	outline:none;
	margin:1.5em auto;
	transition: all .5s ease;
}
.form__input:focus{
	border-bottom-color: #008080;
	box-shadow: 0 0 5px rgba(0,80,80,.4); 
	border-radius: 4px;
}
.btn{
	transition: all .5s ease;
	width: 70%;
	border-radius: 30px;
	color:#008080;
	font-weight: 600;
	background-color: #fff;
	border: 1px solid #008080;
	margin-top: 1.5em;
	margin-bottom: 1em;
	margin-left: 2.5em;
}
.btn:hover, .btn:focus{
	background-color: #008080;
	color:#fff;
}
</style>