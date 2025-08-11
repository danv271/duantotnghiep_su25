/**
* Theme: Larkon - Responsive Bootstrap 5 Admin Dashboard
* Author: Techzaa
* Module/App: Dashboard
*/

// Global chart instances to manage re-rendering
let conversionsChart = null;
let performanceChart = null;

// Event listeners for time range buttons
document.querySelectorAll('.btnHandleData').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();

        // Remove active class from all buttons
        document.querySelectorAll('.btnHandleData').forEach(btn => btn.classList.remove('active'));

        // Add active class to clicked button
        this.classList.add('active');

        // Get time range from data attribute or button text
        const timeRange = this.getAttribute('data-time') || getTimeRangeFromText(this.textContent.trim());
        handleDataToChart(timeRange, event);
    });
});

function getTimeRangeFromText(text) {
    switch (text) {
        case '1M': return 1;
        case '6M': return 6;
        case '1Y': return 12;
        case 'All': return 'all';
        default: return 'all';
    }
}

const handleDataToChart = async (timeRange, event) => {
    if (event) {
        event.preventDefault();
    }

    try {
        // Show loading state
        showLoadingState();

        // Fetch chart and conversion data
        const [chartRes, conversionRes] = await Promise.allSettled([
            callApiChart(timeRange),
            callApiConversion()
        ]);

        // Handle chart data
        if (chartRes.status === 'fulfilled' && chartRes.value && chartRes.value.length > 0) {
            updatePerformanceChart(chartRes.value, timeRange); // Pass timeRange
        } else {
            console.warn('No chart data available for time range:', timeRange);
            updatePerformanceChart([], timeRange);
        }

        // Handle conversion data
        if (conversionRes.status === 'fulfilled' && conversionRes.value) {
            updateConversionsChart(conversionRes.value);
        } else {
            console.warn('Conversion data not available, using fallback');
            // You may want to use a fallback value or show an error
        }

    } catch (error) {
        console.error('Error handling data to chart:', error);
        showErrorMessage('Failed to load chart data. Please try again.');
    } finally {
        hideLoadingState();
    }
};

async function callApiChart(timeRange) {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/chart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ time: timeRange })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        return result;

    } catch (error) {
        console.error('Error calling API chart:', error);
        throw error; // Re-throw to handle in calling function
    }
}

async function callApiConversion() {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/order', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        return result;

    } catch (error) {
        console.error('Error calling API conversion:', error);
        throw error;
    }
}

// Initialize charts with data from API
async function initializeCharts() {
    try {
        showLoadingState();

        const [chartRes, conversionRes] = await Promise.allSettled([
            callApiChart('all'),
            callApiConversion()
        ]);

        // Handle chart data
        if (chartRes.status === 'fulfilled' && chartRes.value && chartRes.value.length > 0) {
            updatePerformanceChart(chartRes.value);
        } else {
            console.warn('Chart data not available, using empty data');
            updatePerformanceChart([]);
        }

        // Handle conversion data
        if (conversionRes.status === 'fulfilled' && conversionRes.value) {
            updateConversionsChart(conversionRes.value);
            console.log('Conversion data initialized:', conversionRes.value);
        } else {
            console.warn('Conversion data not available, using fallback');
            // Create fallback data structure if needed
            const fallbackData = {
                chart: {
                    series: [65.2],
                    data: [150, 75] // handle orders, failed orders
                }
            };
            updateConversionsChart(fallbackData);
        }

    } catch (error) {
        console.error('Error initializing charts:', error);
        showErrorMessage('Failed to initialize dashboard. Please refresh the page.');
    } finally {
        hideLoadingState();
    }
}

// Helper function to calculate conversion rate from data
function calculateConversionRate(data) {
    if (data.length >= 2) {
        // Sort by date for proper comparison
        const sortedData = data.sort((a, b) => new Date(b.date) - new Date(a.date));
        const current = parseFloat(sortedData[0].total_price);
        const previous = parseFloat(sortedData[1].total_price);

        if (previous > 0) {
            const rate = ((current - previous) / previous * 100);
            return Math.abs(rate); // Return absolute value for positive display
        }
    }

    // If only 1 record, calculate % based on target or baseline
    if (data.length === 1) {
        const current = parseFloat(data[0].total_price);
        // Assume target is 10M, calculate % achieved
        const target = 10000000;
        return ((current / target) * 100).toFixed(1);
    }

    return 0; // No data
}

// Update Conversions Chart function
// Update Conversions Chart function - Fixed to match API response structure
function updateConversionsChart(conversionData) {
    // Destroy existing chart if it exists
    if (conversionsChart) {
        conversionsChart.destroy();
        conversionsChart = null;
    }

    // Ensure we have valid data structure
    if (!conversionData || !conversionData.current_month || !conversionData.last_month) {
        console.error('Invalid conversion data structure');
        return;
    }

    // Get return rate from current month data
    const currentReturnRate = parseFloat(conversionData.current_month.return_rate) || 0;

    var options = {
        chart: {
            height: 292,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '14px',
                        color: "undefined",
                        offsetY: 100
                    },
                    value: {
                        offsetY: 55,
                        fontSize: '20px',
                        color: undefined,
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                },
                track: {
                    background: "rgba(170,184,197, 0.2)",
                    margin: 0
                },
            }
        },
        fill: {
            gradient: {
                enabled: true,
                shade: 'dark',
                shadeIntensity: 0.2,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            },
        },
        stroke: {
            dashArray: 4
        },
        colors: ["#ff6c2f", "#22c55e"],
        series: [currentReturnRate], // Use return_rate from current_month
        labels: ['Tỉ lệ khách hàng quay trở lại'],
        responsive: [{
            breakpoint: 380,
            options: {
                chart: {
                    height: 180
                }
            }
        }],
        grid: {
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        }
    };

    // Update DOM elements with data from API response
    const handleOrderEl = document.getElementById('handleOrder');
    const failOrderEl = document.getElementById('failOrder');

    if (handleOrderEl && conversionData.current_month.returning_customers) {
        handleOrderEl.textContent = conversionData.current_month.returning_customers;
    }
    if (failOrderEl && conversionData.last_month.returning_customers) {
        failOrderEl.textContent = conversionData.last_month.returning_customers;
    }

    // Update additional stats if elements exist
    const currentMonthEl = document.getElementById('currentMonthStats');
    const lastMonthEl = document.getElementById('lastMonthStats');
    const trendEl = document.getElementById('trendIndicator');

    if (currentMonthEl) {
        currentMonthEl.innerHTML = `
            <div class="stat-item">
                <span class="label">Tháng ${conversionData.current_month.month_name}:</span>
                <span class="value">${conversionData.current_month.returning_customers}/${conversionData.current_month.total_customers} khách hàng</span>
            </div>
        `;
    }

    if (lastMonthEl) {
        lastMonthEl.innerHTML = `
            <div class="stat-item">
                <span class="label">Tháng ${conversionData.last_month.month_name}:</span>
                <span class="value">${conversionData.last_month.returning_customers}/${conversionData.last_month.total_customers} khách hàng</span>
            </div>
        `;
    }

    if (trendEl) {
        const trend = conversionData.comparison.trend;
        const difference = Math.abs(parseFloat(conversionData.comparison.difference));
        const growthRate = parseFloat(conversionData.comparison.growth_rate);

        let trendClass = 'neutral';
        let trendIcon = '→';

        if (trend === 'tăng') {
            trendClass = 'positive';
            trendIcon = '↑';
        } else if (trend === 'giảm') {
            trendClass = 'negative';
            trendIcon = '↓';
        }

        trendEl.innerHTML = `
            <span class="trend ${trendClass}">
                ${trendIcon} ${trend} ${difference.toFixed(1)}% 
                (${growthRate >= 0 ? '+' : ''}${growthRate.toFixed(1)}%)
            </span>
        `;
    }

    // Create new chart
    conversionsChart = new ApexCharts(
        document.querySelector("#conversions"),
        options
    );

    conversionsChart.render();
}

// Initialize charts with updated fallback data structure
async function initializeCharts() {
    try {
        showLoadingState();

        const [chartRes, conversionRes] = await Promise.allSettled([
            callApiChart('all'),
            callApiConversion()
        ]);

        // Handle chart data
        if (chartRes.status === 'fulfilled' && chartRes.value && chartRes.value.length > 0) {
            updatePerformanceChart(chartRes.value);
        } else {
            console.warn('Chart data not available, using empty data');
            updatePerformanceChart([]);
        }

        // Handle conversion data with updated fallback structure
        if (conversionRes.status === 'fulfilled' && conversionRes.value) {
            updateConversionsChart(conversionRes.value);
            console.log('Conversion data initialized:', conversionRes.value);
        } else {
            console.warn('Conversion data not available, using fallback');
            // Create fallback data structure matching API response
            const fallbackData = {
                current_month: {
                    return_rate: 65.2,
                    total_customers: 150,
                    returning_customers: 98,
                    new_customers: 52,
                    month_name: new Date().toLocaleDateString('vi-VN', { month: '2-digit', year: 'numeric' })
                },
                last_month: {
                    return_rate: 58.3,
                    total_customers: 120,
                    returning_customers: 70,
                    new_customers: 50,
                    month_name: new Date(Date.now() - 30 * 24 * 60 * 60 * 1000).toLocaleDateString('vi-VN', { month: '2-digit', year: 'numeric' })
                },
                comparison: {
                    growth_rate: 6.9,
                    difference: 6.9,
                    trend: 'tăng'
                }
            };
            updateConversionsChart(fallbackData);
        }

    } catch (error) {
        console.error('Error initializing charts:', error);
        showErrorMessage('Failed to initialize dashboard. Please refresh the page.');
    } finally {
        hideLoadingState();
    }
}
// Performance Chart function - update with data from API
function updatePerformanceChart(apiData, timeRange = 'all') {
    // Destroy existing chart if it exists
    if (performanceChart) {
        performanceChart.destroy();
        performanceChart = null;
    }

    // Process API data into chart format with timeRange
    let chartData = processApiDataForChart(apiData, timeRange);

    // Determine chart title and labels based on time range
    const isMonthlyView = timeRange === 1 || timeRange === '1';
    const xAxisTitle = isMonthlyView ? 'Ngày' : 'Tháng';
    const seriesName = isMonthlyView ? 'Doanh thu hàng ngày (M VND)' : 'Doanh thu (M VND)';
    const growthLabel = isMonthlyView ? 'Tỷ lệ tăng trưởng hàng ngày (%)' : 'Tỷ lệ tăng trưởng (%)';

    var options = {
        series: [{
            name: seriesName,
            type: "bar",
            data: chartData.revenues,
            yAxisIndex: 0,
        },
        {
            name: growthLabel,
            type: "line",
            data: chartData.growthRates,
            yAxisIndex: 1,
        }],
        chart: {
            height: 400,
            type: "line",
            toolbar: {
                show: false,
            },
        },
        stroke: {
            width: [0, 3],
            curve: 'smooth'
        },
        fill: {
            opacity: [0.8, 1],
            type: ['solid', 'solid'],
        },
        markers: {
            size: [0, 6],
            strokeWidth: 2,
            hover: {
                size: 8,
            },
        },
        xaxis: {
            categories: chartData.categories,
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            title: {
                text: xAxisTitle,
                style: {
                    fontSize: '12px',
                    fontWeight: 500,
                    color: '#666'
                }
            }
        },
        yaxis: [
            {
                title: {
                    text: 'Doanh thu (Triệu VND)',
                    style: {
                        color: '#ff6c2f',
                    }
                },
                labels: {
                    style: {
                        colors: '#ff6c2f',
                    },
                    formatter: function (val) {
                        return val.toLocaleString() + 'M';
                    }
                },
                min: 0,
            },
            {
                opposite: true,
                title: {
                    text: isMonthlyView ? 'Tỷ lệ tăng trưởng hàng ngày (%)' : 'Tỷ lệ tăng trưởng (%)',
                    style: {
                        color: '#22c55e',
                    }
                },
                labels: {
                    style: {
                        colors: '#22c55e',
                    },
                    formatter: function (val) {
                        return val.toFixed(1) + '%';
                    }
                },
            }
        ],
        grid: {
            show: true,
            strokeDashArray: 3,
            borderColor: '#f0f0f0',
            xaxis: {
                lines: {
                    show: false,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
            padding: {
                top: 0,
                right: 30,
                bottom: 0,
                left: 10,
            },
        },
        legend: {
            show: true,
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 0,
            offsetY: 0,
            markers: {
                width: 12,
                height: 12,
                radius: 6,
            },
            itemMargin: {
                horizontal: 20,
                vertical: 5,
            },
        },
        plotOptions: {
            bar: {
                columnWidth: isMonthlyView ? "60%" : "50%", // Adjust bar width for daily view
                borderRadius: 4,
            },
        },
        colors: ["#ff6c2f", "#22c55e"],
        tooltip: {
            shared: true,
            intersect: false,
            y: [
                {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toLocaleString() + " Triệu VND";
                        }
                        return y;
                    },
                },
                {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(1) + "%";
                        }
                        return y;
                    },
                }
            ],
        },
        dataLabels: {
            enabled: !isMonthlyView, // Disable labels for daily view to avoid clutter
            enabledOnSeries: [1], // Only show labels for growth rate
            formatter: function (val, opts) {
                return val.toFixed(1) + '%';
            },
            style: {
                colors: ['#22c55e']
            }
        }
    };

    // Create new chart
    performanceChart = new ApexCharts(
        document.querySelector("#dash-performance-chart"),
        options
    );

    performanceChart.render();
}

// Process API data into chart format
function processApiDataForChart(apiData, timeRange = 'all') {
    if (!apiData || apiData.length === 0) {
        return {
            categories: ["Không có dữ liệu"],
            revenues: [0],
            growthRates: [0]
        };
    }

    // Sort data by date
    const sortedData = apiData.sort((a, b) => new Date(a.date) - new Date(b.date));

    const categories = [];
    const revenues = [];
    const growthRates = [];

    // Check if timeRange is 1 month to show daily data
    const isMonthlyView = timeRange === 1 || timeRange === '1';

    if (isMonthlyView) {
        // For 1 month view, show daily data
        sortedData.forEach((item, index) => {
            const date = new Date(item.date);
            const dayMonth = `Ngày ${date.getDate()} / ${date.getMonth() + 1}`;
            categories.push(dayMonth);

            // Revenue - convert to millions for readability
            const revenue = parseFloat(item.total_price) / 1000000;
            revenues.push(revenue);

            // Calculate growth rate compared to previous day
            if (index > 0) {
                const currentRevenue = parseFloat(item.total_price);
                const prevRevenue = parseFloat(sortedData[index - 1].total_price);
                const growthRate = prevRevenue > 0 ? ((currentRevenue - prevRevenue) / prevRevenue * 100) : 0;
                growthRates.push(Number(growthRate.toFixed(1)));
            } else {
                growthRates.push(0); // First day has no comparison data
            }
        });
    } else {
        // For other time ranges, show monthly data
        sortedData.forEach((item, index) => {
            // Format month from date
            const date = new Date(item.date);
            const monthYear = `Tháng ${date.getMonth() + 1}/${date.getFullYear()}`;
            categories.push(monthYear);

            // Revenue - keep VND value, divide by 1000000 for readability (million VND)
            const revenue = parseFloat(item.total_price) / 1000000;
            revenues.push(revenue);

            // Calculate growth rate compared to previous month
            if (index > 0) {
                const currentRevenue = parseFloat(item.total_price);
                const prevRevenue = parseFloat(sortedData[index - 1].total_price);
                const growthRate = prevRevenue > 0 ? ((currentRevenue - prevRevenue) / prevRevenue * 100) : 0;
                growthRates.push(Number(growthRate.toFixed(1)));
            } else {
                growthRates.push(0); // First period has no comparison data
            }
        });
    }

    return {
        categories,
        revenues,
        growthRates
    };
}

// Utility functions for loading states
function showLoadingState() {
    // Disable buttons during loading
    document.querySelectorAll('.btnHandleData').forEach(btn => {
        btn.disabled = true;
        btn.style.opacity = '0.6';
    });

    // You can add loading spinners here
    console.log('Loading chart data...');
}

function hideLoadingState() {
    // Re-enable buttons
    document.querySelectorAll('.btnHandleData').forEach(btn => {
        btn.disabled = false;
        btn.style.opacity = '1';
    });
}

function showErrorMessage(message) {
    // You can implement a proper notification system here
    console.error(message);
    // Example: show a toast notification or update UI with error state
}


// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function (e) {
    // Initialize charts with data from API
    initializeCharts();
});

// Function to refresh charts with different time range (can be called from UI)
async function refreshChartsWithTimeRange(timeRange) {
    try {
        const res = await callApiChart(timeRange);
        if (res && res.length > 0) {
            // Update charts with new data
            updatePerformanceChart(res);

            // You might need conversion data too
            const conversionRes = await callApiConversion();
            if (conversionRes) {
                updateConversionsChart(conversionRes);
            }
        }
    } catch (error) {
        console.error('Error refreshing charts:', error);
        showErrorMessage('Failed to refresh charts. Please try again.');
    }
}
