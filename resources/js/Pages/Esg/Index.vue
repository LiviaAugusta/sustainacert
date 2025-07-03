<script setup>
import { computed } from 'vue'
import { ref, onMounted } from 'vue'
import axios               from 'axios'
import { fmt } from '@/utils/number'
import { Line }            from 'vue-chartjs'
import {
  Chart, LineElement, PointElement, LinearScale, CategoryScale, Title, Tooltip,
} from 'chart.js'

Chart.register(LineElement, PointElement, LinearScale, CategoryScale, Title, Tooltip)

const kpis = ref([])                // dati grezzi dal backend
const chartData = computed(() => ({
  labels: [...new Set(kpis.value.map(r => r.periodo))].sort(),
  datasets: [
    {
      label: 'CO₂ (t)',
      data: kpis.value
              .filter(r => r.kpi_nome === 'emissioni_co2')
              .map(r => Number(r.valore)),
      borderColor: '#ef4444',
    },
    {
      label: 'Energia (kWh)',
      data: kpis.value
              .filter(r => r.kpi_nome === 'energia_kwh')
              .map(r => Number(r.valore)),
      borderColor: '#3b82f6',
    },
  ],
}))

onMounted(async () => {
  console.log(kpis.value)
  const { data } = await axios.get('/api/esg-kpis')
  console.log(kpis.value)
  kpis.value = data.data
  console.log(kpis.value)
  .sort((a,b) => a.periodo.localeCompare(b.periodo))
  .map(r => Number(r.valore))
  

  // costruisci array periodo / valore per il grafico
  chartData.value.labels = kpis.value.map(r => r.periodo)
  chartData.value.datasets[0].data = kpis.value.map(r => r.valore)
  
})
</script>

<template>
  <section class="p-6 space-y-6">
    <h1 class="text-2xl">ESG KPI</h1>

    <!-- Tabella -->
    <div class="overflow-x-auto rounded-xl shadow">
      <table class="min-w-full text-sm leading-normal">
        <thead class="bg-slate-700 text-white">
          <tr>
            <th class="p-3 text-center">KPI</th>
            <th class="p-3 ttext-center">Valore</th>
            <th class="p-3 ttext-center">Unità</th>
            <th class="p-3 text-center">Periodo</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="row in kpis" :key="row.id" class="odd:bg-slate-800/30">
            <td class="p-3 text-center">{{ row.kpi_nome }}</td>
            <td class="p-3 text-center">{{ fmt(row.valore) }}</td>
            <td class="p-3 text-center">{{ row['unita_misura'] }}</td>
            <td class="p-3 text-center">{{ row.periodo }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Grafico -->
     <div class="h-64">
        <h2 class="text-xl font-semibold">Trend emissioni CO₂</h2>
    <Line :data="chartData" :options="{ responsive: true, maintainAspectRatio: false }" height="260" />
     </div>
    
  </section>
</template>