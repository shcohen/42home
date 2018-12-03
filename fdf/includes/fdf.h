/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fdf.h                                              :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/27 15:37:46 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/03 19:22:37 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FDF_H

# define FDF_H
# include "../libft/libft.h"
# include <fcntl.h>
# include <mlx.h>

// typedef struct      s_struct
// {
//     int             width;
//     int             height;
// }                   t_struct;

// int       ft_bresenham(int x1, int x2, int y1, int y2);
// int         ft_create_window(int x, int y);
int         **ft_check_map(int fd, int width, int height);

#endif