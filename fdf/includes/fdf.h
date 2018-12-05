/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fdf.h                                              :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/27 15:37:46 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/05 18:11:09 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FDF_H

# define FDF_H
# include "../libft/libft.h"
# include <fcntl.h>
# include <mlx.h>

typedef struct      s_map
{
    int             **tab;
    int             width;
    int             height;
}                   t_map;

typedef struct      s_all
{
    t_map           map;
}                   t_all;

t_all          *ft_check_map(int fd, t_all *all);
// int         ft_create_window(int x, int y);
// int         ft_bresenham(int x1, int x2, int y1, int y2);
// int         ft_put_pixel(int x1, int y1);

#endif