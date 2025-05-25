#include <stdio.h>

double calcular_sequencia_s(int n) {
    double s = 0.0;
    for (int i = 1; i <= n; i++) {
        s += 1.0 / i;
    }
    return s;
}

int main() {
    int n_val;
    scanf("%d", &n_val);
    if (n_val >= 1) {
        double resultado = calcular_sequencia_s(n_val);
        printf("%.2f\n", resultado);
    }
    return 0;
}
