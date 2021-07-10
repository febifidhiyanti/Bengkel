<template>
    <div class="input-group mb-3">
      
      	<!-- INPUTAN INI AKAN KETRIGGER JIKA TOMBOL ENTER DITEKAN -->
        <input type="text" name="message" class="form-control" placeholder="Kirim Pesan..." v-model="message" @keyup.enter="submit">
        <div class="input-group-append">
          
          	<!-- ATAU JIKA TOMBOL SEND DI KLIK -->
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="submit">
                Send
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        //COMPONENT INI JUGA MEMINTA DATA USER YANG AKAN MENGIRIMKAN PESAN
        //DARI CODE SEBELUMNYA KITA JUGA MENGIRIMKAN PROPS BERUPA DATA USER YANG SEDANG LOGIN
        props: ['user'],
        data() {
            return {
                //VALUE DEFAULT DARI INPUTAN KOSONG
                message: ''
            }
        },

        methods: {
            //JIKA ENTER ATAU TOMBOL DIKLIK MAKA FUNGSI INI AKAN DIJALANKAN
            submit() {
                //MENGIRIMKAN EMIT KE PENGGUNA COMPONENT INI UNTUK KEMUDIAN DATANYA DIPROSES PADA FILE LAINNYA
                //EMITNYA BERNAMA SENT, DAN DATA YANG DIKIRIM ADALAH PESAN DAN USER PEMILIKNYA
                this.$emit('sent', {
                    user: this.user,
                    message: this.message
                });

                //INPUTAN UNTUK MENGIRIM PESAN DIKOSONGKAN LAGI
                this.message = ''
            }
        }    
    }
</script>