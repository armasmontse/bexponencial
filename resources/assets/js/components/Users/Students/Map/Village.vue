<template>
    <div>
        <div v-for="mission in missions">
            <div
                style="margin-bottom:
                    10px;display:block;
                    padding:15px;
                    border:1px solid #000;
                    border-radius:50%;
                    width:150px;"
                class="mission-item">
                <router-link :to="{ name: 'mission', params: { id: mission.missionId} }">
                    <p style="text-align:center" class="title">{{mission.missionName}}</p>
                </router-link>
            </div>
            <br>
            {{
                mission.missionChallengesFinishedCount
                + ' retos cumplidos de ' +
                mission.missionChallengesCount
            }}
            <br><br><br><br>
        </div>
</div>
</template>
<script>
    export default {
        props: ['missions'],
    }
</script>
