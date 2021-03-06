// vendors

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

Vue.component('font-awesome-icon', FontAwesomeIcon);

// our components
Vue.component('toast', require('./Global/Toast').default);
Vue.component('ConfirmationSubmit', require('./Global/ConfirmationSubmit').default);
Vue.component('Catalogue', require('./Catalouge/Catalogue').default);

// utilities
Vue.component('Drawer', require('./Utilities/Drawer').default);
Vue.component('ListSection', require('./Utilities/ListSection').default);
Vue.component('Datatable', require('./Utilities/Datatable/Datatable').default);
Vue.component('ModalComponent', require('./Utilities/ModalComponent').default);
Vue.component('Tabs', require('./Utilities/Tabs/Tabs').default);
Vue.component('Tab', require('./Utilities/Tabs/Tab').default);
Vue.component('Carousel', require('./Utilities/Carousel').default);
Vue.component('DynamicTable', require('./Utilities/DynamicTable').default);
Vue.component('ImageManager', require('./Utilities/ImageManager/ImageManager').default);


// form
Vue.component('AjaxForm', require('./Form/AjaxForm').default);
Vue.component('DynamicForm', require('./Form/DynamicForm').default);
Vue.component('DynamicFields', require('./Form/DynamicFields').default);
Vue.component('TextField', require('./Form/TextField').default);
Vue.component('TextareaField', require('./Form/TextareatField').default);
Vue.component('AlternativeSubmitField', require('./Form/AlternativeSubmitField').default);
Vue.component('HelpField', require('./Form/HelpField').default);
Vue.component('MultiselectField', require('./Form/MultiselectField').default);


// blog
Vue.component('Editor', require('./Blog/Editor').default);