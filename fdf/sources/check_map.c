/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   check_map.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:18 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/07 18:48:59 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

t_all     *ft_check_map(int fd, t_all *all)
{
    char    *line;  // current line
    char    *str;   // content of file
    char    **arr;  // lines
    int     i;
    int     j;
    int     k;

    all->map.height = 0;
    str = NULL;
    while (get_next_line(fd, &line))                // read file and fill content
    {
        i = 0;
        j = 0;
        while (line && line[i])
        {
            if (line[i] >= '0' && line[i] <= '9' && (!i || line[i - 1] == ' '))
                j++;
            if (!(ft_isdigit(line[i])) && line[i] != ' ' && line[i] != '\n')
                return (NULL);
            i++;
        }
        if (!str)
            all->map.width = j;
        else if (j != all->map.width)
            exit(1);
        if (str == NULL)
            str = ft_strnew(1);
        else
            str = ft_strjoin(str, "\n");
        str = ft_strjoin(str, line);
        all->map.height++;
        free(line);                                 // leaks
    }
    arr = ft_strsplit(str, '\n');                   // parse content to lines
    i = 0;
    k = 0;
    if (!(all->map.tab = (int **)malloc(sizeof(int *) * (all->map.height + 1))))
		return (NULL);
    while (i < all->map.height || (all->map.tab[i] = NULL))   // columns
    {
        j = 0;
        if (!(all->map.tab[i] = (int *)malloc(sizeof(int) * all->map.width)))
		    return (NULL);
        k = -1;
        while (arr[i] && arr[i][++k] && j < all->map.width)   // parse lines to final array
            if (arr[i][k] >= '0' && arr[i][k] <= '9' && (!k || arr[i][k - 1] == ' '))
                all->map.tab[i][j++] = ft_atoi(arr[i] + k);
        i++;
    }
    return (all); // final array
}