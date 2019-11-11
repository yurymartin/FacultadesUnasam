Vue.component('ckeditor', {
    template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
    props: {
        value: {
          type: String
        },
        id: {
          type: String,
          default: 'editor'
        },
        height: {
          type: String,
          default: '90px',
        },
        toolbar: {
          type: Array,
          default: () => [
            ['Undo','Redo'],
            ['Bold','Italic','Strike'],
            ['NumberedList','BulletedList'],
            ['Cut','Copy','Paste'],
          ]
        },
        language: {
          type: String,
          default: 'en'
        },
        extraplugins: {
          type: String,
          default: ''
        }
          },
          beforeUpdate () {
        const ckeditorId = this.id
        if (this.value !== CKEDITOR.instances[ckeditorId].getData()) {
          CKEDITOR.instances[ckeditorId].setData(this.value)
        }
          },
          mounted () {
        const ckeditorId = this.id
        console.log(this.value)
        const ckeditorConfig = {
          toolbar: this.toolbar,
          language: this.language,
          height: this.height,
          extraPlugins: this.extraplugins
        }
        CKEDITOR.replace(ckeditorId, ckeditorConfig)
        CKEDITOR.instances[ckeditorId].setData(this.value)
        CKEDITOR.instances[ckeditorId].on('change', () => {
          let ckeditorData = CKEDITOR.instances[ckeditorId].getData()
          if (ckeditorData !== this.value) {
            this.$emit('input', ckeditorData)
          }
        })
          },
          destroyed () {
        const ckeditorId = this.id
        if (CKEDITOR.instances[ckeditorId]) {
          CKEDITOR.instances[ckeditorId].destroy()
        }
          }
    
  });
