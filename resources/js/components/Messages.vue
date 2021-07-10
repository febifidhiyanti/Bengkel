<template>
    <ul class="chat">
        <!-- DATA TERSEBUT BERUPA ARRAY YANG BERISI PESAN -->
        <!-- KITA LOOPING DATA TERSEBUT UNTUK MENAMPILKAN SEMUA ISI PESAN DAN PENGIRIM -->
        <li class="left clearfix" v-for="(message, index) in messages" :key="message + '-' + index">
            <div class="chat-body clearfix"
                >
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        //INGAT TAG :message="" DI CODE SEBELUMNYA? CODE TERSEBUT DISEBUT SEBAGIA PROPS
        //GUNANYA UNTUK MENGIRIMKAN DATA KE COMPONENT YANG DITUJU
        //DALAM HAL INI KITA MENGIRIMKAN DATA DENGAN PROPS MESSAGE KE COMPONENT MESSAGES.VUE
        props: ['messages']
    }
</script>
