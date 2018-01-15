<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name='csrf-token']").getAttribute('content');
var app = new Vue({
        el: '#app',
        data: {
           
        	test_cases: '',
            size_matrix:'',
            number_operations:'',
        	error:false,
            errors:[],
            input_data:[],
            output_data:[],
            array_cube:[],
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
                        this.errors    = response.data.error;
                        
                    }else{

                        this.error = false;
                        
                        this.input_data  = response.data[0];
                        this.output_data = response.data[1];
                        this.array_cube  = response.data[2];

                        console.log(this.array_cube);

                        
                    }
                }, function (error) {
                    
                    console.log(error);
                });
            },
        }
    });
</script>