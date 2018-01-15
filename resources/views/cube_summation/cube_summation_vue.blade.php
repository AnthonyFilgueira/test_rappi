<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name='csrf-token']").getAttribute('content');
var app = new Vue({
        el: '#app',
        data: {
           
        	name: '',
        	error:false,
        	message: '',
            success:false,
            errors:[],
        },
        mounted: function () {
           
        },
        computed: {
           
        },
        methods: {
            
        }
    });
</script>