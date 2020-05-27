<template>
    <b-card
      header="Order List"
      header-tag="header"
      header-bg-variant="info"
      header-text-variant="white"
    >
    <div>
        <b-col lg="3" class="my-2 float-right">
          <b-form-input
            v-model="filter"
            type="search"
            id="filterInput"
            placeholder="Search Order"
          ></b-form-input>
        </b-col>
        <b-table small hover responsive :items="this.orders" :fields="fields" :per-page="perPage" :current-page="currentPage" :filter="filter">
          <template v-slot:cell(actions)="row">
            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
              View
            </b-button>
          </template>
        </b-table>
    </div>
    <div class="mt-3" v-if="this.orders.length">
      <b-pagination
        pills 
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        aria-controls="my-table"
        align="right"
        size="sm"
      ></b-pagination>
    </div>
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only>
      <!-- <pre>{{ infoModal.content }}</pre> -->
      <b-list-group>
        <b-list-group-item class="flex-column align-items-start" v-for="(item, index) in infoModal.content" :key="item.id">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Pizza # {{ index + 1 }} </h5>
          </div>
          <p class="mb-1">
            Pizza Size: {{ item.pizza_size }} <br />
            Pizza Crust: {{ item.pizza_crust }} <br />
            Pizza Type: {{ item.pizza_type }} <br />
          </p>
          <div v-if="item.pizza_type === 'Custom'">
            <p>Toppings: </p>
            <ul>
              <li>
                Whole: {{ item.topping_whole }}
              </li>
              <li>
                First Half: {{ item.topping_firsthalf }}
              </li>
              <li>
                Second Half: {{ item.topping_secondhalf }}
              </li>
            </ul>
          </div>
        </b-list-group-item>
      </b-list-group>
    </b-modal>
    </b-card>
</template>

<script>
    export default {
    props: [
      'orders'
    ],
    data() {
      return {
        filter: null,
        perPage: 10,
        currentPage: 1,
        data_results: [],
        fields: [
          {
            key: 'id',
            sortable: true,
            label: 'Order No.',
          },
          {
            key: 'amount',
            sortable: true,
            label: 'Amount',
          },
          {
            key: 'created_at',
            sortable: true,
            label: 'Date',
          },
          { key: 'actions', label: 'Actions' }
        ],
        infoModal: {
          id: 'info-modal',
          title: '',
          content: ''
        }
      }
    },
    methods: {
      info(item, index, button) {
        this.infoModal.title = `Order No : ${item.id}`
        axios.get(`/orders/${item.id}`)
        .then(function (response) {
            this.data_results = response.data;
            this.infoModal.content = this.data_results
        }.bind(this));
        
        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
      },
    },
    computed: {
      rows() {
        return this.orders.length
      }
    }
  }
</script>
