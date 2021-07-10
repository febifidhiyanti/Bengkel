<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-header">
                    <h4 class="m-t-1 m-b-20 header-title text-center mt-3"><b>Chat</b></h4>
                </div>
                <div class="card-box">
                    <message v-for="chat, index in chats" :chats="chat" :key="index"></message>                 
                </div>
                <div class="card-footer">
                    <form @submit.prevent="send" method="post">
                        <div class="input-group">
                            <input type="text" name="message" v-model="form.message" laceholder="Type Message ..." class="form-control" required>
                            <span class="input-group-append">
                                <button type="submit" class="btn" style="background-color: rgb(95, 190, 170);">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                chats: [],
                form: new Form({
                    message: ""
                })
            }
        },
            mounted() {
                this.get_chat();
            },
            methods: {
                get_chat(){
                    axios.get('message')
                    .then(res => {
                        this.chats = res.data;
                    }).catch(err => console.log(err));
                },
            send(){
                this.form.post('message')
                    .then(res => {
                        this.form.reset();
                    });
            }
        }
    }
</script>
