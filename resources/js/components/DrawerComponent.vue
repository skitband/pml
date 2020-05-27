<template>
    <b-sidebar
      id="sidebar-backdrop"
      title="New Pizza Order"
      backdrop
      shadow
    >
        <div class="px-3 py-2">
            <b-form :action="this.route" method="post">
                <input type="hidden" name="_token" :value="csrf">
                <div v-for="(pizza, index) in pizzas" :key="index">
                  <b-button size="sm" @click="removePizza(index)" type="button" variant="danger"><b-icon icon="trash"></b-icon></b-button>
                  <br />
                  <b-form-group 
                      label="Size:">
                      <b-form-select
                      v-model="pizza.selected_pizza_size"
                      :options="pizza_sizes_options"
                      required
                      name="pizza_size[]"
                      ></b-form-select>
                  </b-form-group>

                  <b-form-group 
                      label="Crust:" label-for="pizza_crust">
                      <b-form-select
                      v-model="pizza.selected_pizza_crust"
                      :options="pizza_crusts"
                      name="pizza_crust[]"
                      required
                      ></b-form-select>
                  </b-form-group>

                  <b-form-group 
                      label="Type:" label-for="pizza_type">
                      <b-form-select
                      v-model="pizza.selected_pizza_type"
                      :options="pizza_types"
                      name="pizza_type[]"
                      required
                      ></b-form-select>
                  </b-form-group>
                  <div>
                      <b-form-group label="Topping Whole:">
                      <b-form-checkbox-group
                          v-model="pizza.toppings_whole"
                          :options="toppings_options"
                          name="topping_whole[]"
                          stacked
                      ></b-form-checkbox-group>
                      </b-form-group>

                      <b-form-group label="Topping First-Half:">
                          <b-form-checkbox-group
                              v-model="pizza.toppings_firsthalf"
                              :options="toppings_options"
                              name="topping_firsthalf[]"
                              stacked
                          ></b-form-checkbox-group>
                      </b-form-group>

                      <b-form-group label="Topping Second-Half:">
                          <b-form-checkbox-group
                              v-model="pizza.toppings_secondhalf"
                              :options="toppings_options"
                              name="topping_secondhalf[]"
                              stacked
                          ></b-form-checkbox-group>
                      </b-form-group>
                  </div>
                  <hr />
                </div>
                <b-row class="my-1">
                  <b-col lg="6" sm="6">
                    <label for="input-default">Total:</label>
                  </b-col>
                  <b-col lg="6" sm="6">
                    <b-form-input name="totalAmount" v-model="this.totalAmount" size="sm" readonly></b-form-input>
                  </b-col>
                </b-row>
                <hr />
                <b-button size="sm" @click="addPizza" type="button" variant="secondary" block>Add More </b-button>
                <b-button type="submit" variant="info" block :disabled="pizzas.length <= 0">Submit</b-button>
            </b-form>
        </div>
    </b-sidebar>
</template>

<script>
  export default {
    props: ['route'],
    data () {
      return {
        pizzas: [],
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        pizza_sizes_options: [{ value: 100, text: 'Small' },{ value: 150, text: 'Medium' },{ value: 200, text: 'Large' }],
        pizza_crusts: ['Hand Tossed', 'Deep Dish'],
        pizza_types: ['Hawaiian', 'Chicken Fajita', 'Pepperoni Feast', 'Custom'],
        toppings_options: [
          { text: 'Pineapple', value: 'pineapple' },
          { text: 'Pepperoni', value: 'pepperoni' },
          { text: 'Mushrooms', value: 'mushrooms' },
          { text: 'Extra Cheese', value: 'extra_cheese' },
          { text: 'Sausage', value: 'sausage' },
          { text: 'Ham', value: 'ham' },
          { text: 'Onions', value: 'onion' },
          { text: 'Bacons', value: 'bacons' },
          { text: 'Black olives', value: 'black_olive' },
          { text: 'Green peppers', value: 'green_pepper' },
          { text: 'Spinach', value: 'spinach' },
          { text: 'Mozzarella', value: 'mozzarella' },
        ],
        show: true,
      }
    },
    computed: {
      totalToppings() {
        return this.pizzas.reduce((total, pizza) => {
          return total + Number((pizza.toppings_whole.length + pizza.toppings_firsthalf.length + pizza.toppings_secondhalf.length) * 20);
        }, 0);
      },

      totalPizza() {
        return this.pizzas.reduce((total, pizza) => {
          return total + Number(pizza.selected_pizza_size);
        }, 0);
      },

      totalAmount() {
        return this.totalToppings + this.totalPizza;
      }

    },
    created() {
      this.addPizza();
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        let formAction = evt.target.action;
      },
      addPizza () {
        this.pizzas.push({
            selected_pizza_size: 100,
            selected_pizza_crust: 'Hand Tossed',
            selected_pizza_type: 'Hawaiian',
            price: 0,
            toppings_whole: [],
            toppings_firsthalf: [],
            toppings_secondhalf: [],
        })
      },
      removePizza (index) {
        Vue.delete(this.pizzas, index);
      },
    }
  }
</script>