<template>
    <Detail :role="this.role">
        <form class="space-y-8 divide-y divide-gray-200">
            
        </form>
    </Detail>
</template>

<script>
import Detail from '../Detail'
export default {
    props: ['role'],
    name: 'Settings',
    components: { Detail }
}
</script>
