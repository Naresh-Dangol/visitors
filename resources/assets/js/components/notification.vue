<template>
    <li class="dropdown notifications-menu">
        <a href="data-count" class="dropdown-toggle" data-toggle="dropdown">
            <i data-count="0" class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ notification }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
        </ul>
    </li>
</template>
<script>
    export default {
        name: 'notification',
        created() {
            console.log(this.notification);
            "use strict";
            var this_= this;
            Echo.private('message')
                .listen('StatusSend', (e) => {
                    this_.notification = e.user.length;
                });
        },
        data() {
            return {
                notification:0
            }
        },
        computed: {}
    }
</script>