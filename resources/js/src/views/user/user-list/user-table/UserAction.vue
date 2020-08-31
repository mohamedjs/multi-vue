<template>
	<vs-td>
      <div class="demo-alignment">
        <vx-tooltip color="success" text="Edit Language">
          <vs-button color="success" @click="edit(user.id)" type="border" icon-pack="feather" icon="icon-edit"></vs-button>
        </vx-tooltip>
        <vx-tooltip color="danger" text="Delete Language">
          <vs-button color="danger" @click="delete(user.id)" type="border" icon-pack="feather" icon="icon-trash"></vs-button>
        </vx-tooltip>
      </div>
    </vs-td>
</template>

<script>
export default {
	props: {
    user: {
      type: array,
      required: true
    }
  },
  data() {
    return {
      user:{}
    }
  }
}
</script>