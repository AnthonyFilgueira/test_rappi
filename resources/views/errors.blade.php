<template>
	<div v-if="error" class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" @click="error = false" >&times;</button>
	    <p>Arregla los siguientes Errores</p>
	    <ul>
	    	<li v-for="error in errors">@{{ error }}</li>
	    </ul>
	</div>
	<div v-if="success" class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"  @click="success = false">&times;</button>
	    <p> @{{ message }}</p>
	</div>
</template>