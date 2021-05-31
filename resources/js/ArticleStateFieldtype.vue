<template>
    <div>
        <div class="inline-flex items-center" style="background-color: #fafcff; border: 1px solid #c4ccd4; border-radius: 3px; padding: 8px 12px; margin: 6px 0;">
            <span class="mr-1 little-dot" :class="dot"></span>
            <p class="text-sm leading-none">{{ this.state }}</p>
        </div>
    </div>
</template>

<script>
export default {
  mixins: [Fieldtype],

  computed: {
        state() {
            return this.meta['state']
        },

        dot() {
            return {
                'draft': this.state !== 'Live',
                'published': this.state === 'Live',
            }
        },
    }
};
</script>
