<template id="timeline-template">
    <ul class="timeline">
        <li v-for="item in activities">
            <div class="timeline-badge">
                <i class="timeline-image">
                    <img :src="'../images/images-news/achievements1.svg'" alt="">
                </i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-date">{{ item.created_at }}</h4>
                        <div class="timeline-panel-controls">
                            <div class="controls">
                                <!--<a
                                    v-for="control in item.controls"
                                    is="timeline-control"
                                    :control="control">
                                </a>-->
                            </div>
                            <div class="timestamp">
                                <small class="text-muted">{{ item.created }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-body">{{ item.action_commited }}</div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    //Indica que la variable llega de otro componente vue
props: ["activities"],

}
</script>
