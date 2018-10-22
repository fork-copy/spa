<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" v-for="status in statuses">
                    <div class="card-header">Home page</div>

                    <div class="card-body">
                        <p>{{ status.user.name }} said ...</p>
                        <p>a moment ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            statuses: []
        };
    },
    created() {
        axios.get('/statuses').then(({data}) => this.statuses = data);
    }
};
</script>
