#include <stdio.h>

int sum(const int *arr, int size);
int max(const int *arr, int size);

int main() {
    const int arr[] = {1, 2, 3, 4, 5};
    const int total = sum(arr, 5);
    const int biggest = max(arr, 5);

    printf("Sum: %d\n", total);
    printf("Max: %d", biggest);
}

int sum(const int *arr, const int size) {
    int sum = 0;

    for (int i = 0; i < size; i++) {
        sum += *arr++;
    }

    return sum;
}

// int max(const int *arr, const int size) {
//     int max = *arr++;
//     for (int i = 1; i < size; i++) {
//         const int value = *arr++;
//         if (max < value) max = value;
//     }
//
//     return max;
// }

int max(const int *arr, const int size) {
    const int *end = arr + size;
    int max = *arr++;
    for (; arr < end; arr++) {
        if (*arr > max) max = *arr;
    }

    return max;
}
