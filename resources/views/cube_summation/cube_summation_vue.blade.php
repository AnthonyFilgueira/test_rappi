<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name='csrf-token']").getAttribute('content');
var app = new Vue({
        el: '#app',
        data: {
           
        	test_cases: '',
            size_matrix:'',
            number_operations:'',
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

            sendCubeSummationFields:function(){

                var cube_summation = {

                    'test_cases':this.test_cases,
                    'size_matrix':this.size_matrix,
                    'number_operations':this.number_operations,
                }
                return cube_summation;
            },
            playCubeSummation:function(){
                this.$http.post('/cube_summation',this.sendCubeSummationFields()).then(function (response) {
                   
                    if (response.data.error) {

                        this.error     = true;
                        this.success   = false;
                        this.errors    = response.data.error;
                        
                    }else{

                       console.log(response);

                        
                    }
                }, function (error) {
                    
                    console.log(error);
                });
            },
        }
    });
</script>