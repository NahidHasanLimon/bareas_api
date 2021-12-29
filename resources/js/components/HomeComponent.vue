<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Area Data Set (Only Last Ten Rows)</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>PostCode</th>
                                    <th>Long</th>
                                    <th>Lat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="area in all_areas.areas">
                                    <td>{{area.name}}</td>
                                    <td>{{area.name}}</td>
                                    <td>{{area.name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data()
        {
            return {
                all_areas : '',

            }
        },
        mounted() {
            // console.log('Component mounted.')
            Echo.channel('areas')
            .listen('.newArea', (area) => {
                alert('Thank you for connecting.');
                console.log('area Received')
                console.log(area.data);
                this.all_areas = area;
                

            });
        },
        created() {
            axios.get('api/get/last-ten-areas/check/websocket', {
                params: {
                }
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        }
    }
</script>
